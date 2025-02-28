<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Vendor;
use App\Models\Certificate;
use App\Models\ExamCertificate;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        // If user typed nothing, return empty results
        if (!$query) {
            return response()->json([
                'exams'          => [],
                'vendors'        => [],
                'certifications' => []
            ]);
        }

        // 1) Normalize the user's search term:
        $normalizedSearch = $this->normalize($query);

        /*
        |--------------------------------------------------------------------------
        | EXAMS
        |--------------------------------------------------------------------------
        |  We'll fetch all or use a smaller subset, then filter in memory by
        |  normalizing 'exam_title' + 'exam_code'.
        |  This ensures 'az-900' matches if user typed 'a z 900', etc.
        */
        $allExams = Exam::select('exam_title','exam_code','vendor_perma','exam_perma','vendor_title')->get();

        $filteredExams = $allExams->filter(function($exam) use ($normalizedSearch) {
            // Combine and normalize
            $combined = $this->normalize($exam->exam_title . $exam->exam_code);
            // Check if the exam's combined string CONTAINS the normalized search
            return str_contains($combined, $normalizedSearch);
        })->take(50);

        /*
        |--------------------------------------------------------------------------
        | VENDORS
        |--------------------------------------------------------------------------
        |  Similar approach: fetch, then filter by vendor_title.
        */
        $allVendors = Vendor::select('vendor_title','vendor_perma','vendor_id')->get();

        $filteredVendors = $allVendors->filter(function($vendor) use ($normalizedSearch) {
            $titleNormalized = $this->normalize($vendor->vendor_title);
            return str_contains($titleNormalized, $normalizedSearch);
        })->take(20);

        /*
        |--------------------------------------------------------------------------
        | CERTIFICATIONS
        |--------------------------------------------------------------------------
        |  We fetch them, filter by cert_title, then optionally attach vendor info.
        */
        $allCerts = Certificate::select('cert_id','cert_title','cert_name','cert_perma')->get();

        $filteredCerts = $allCerts->filter(function($cert) use ($normalizedSearch) {
            // Combine cert_title + cert_name if you want that as well
            $combined = $this->normalize($cert->cert_title . $cert->cert_name);
            return str_contains($combined, $normalizedSearch);
        })->take(30);

        // Now attach vendor info (via ExamCertificate) to each filtered cert
        foreach ($filteredCerts as $cert) {
            $examCert = ExamCertificate::where('cert_id', $cert->cert_id)->first();
            if ($examCert) {
                $vendor = Vendor::where('vendor_id', $examCert->vendor_id)->first();
                if ($vendor) {
                    $cert->vendor_title = $vendor->vendor_title;
                    $cert->vendor_perma = $vendor->vendor_perma;
                }
            }
        }

        // Return JSON
        return response()->json([
            'exams'          => $filteredExams->values(),
            'vendors'        => $filteredVendors->values(),
            'certifications' => $filteredCerts->values()
        ]);
    }

    /**
     * Helper function: remove non-alphanumeric chars & convert to lowercase.
     * e.g. "AZ- 900" => "az900"
     */
    private function normalize($value)
    {
        // Remove everything except [A-Za-z0-9], then lowercase
        return strtolower(preg_replace('/[^A-Za-z0-9]/', '', $value));
    }
}
