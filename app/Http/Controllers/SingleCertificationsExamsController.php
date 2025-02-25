<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\SingleCertificate;
use App\Models\CertificateMultipleExam;
use Illuminate\Routing\Controller;

class SingleCertificationsExamsController extends Controller
{
    public function getSingleCertificationExams($vendor_perma, $cert_perma)
    {
        // Fetch the certification details based on cert_perma
        $certification = SingleCertificate::where('cert_perma', $cert_perma)->first();

        // Debugging: Check if certification is found
        if (!$certification) {
            abort(404);
        }

        $banner = Banner::latest()->first();

        // Fetch all related exams using cert_id (ignore vendor_perma)
        $relatedExams = CertificateMultipleExam::where('cert_id', $certification->cert_id)->get();

        // Debugging: Check if related exams are fetched
        if ($relatedExams->isEmpty()) {
            return response()->json(['message' => 'No related exams found', 'cert_id' => $certification->cert_id]);
        }

        // Return data to the view
        return view('single_certificate_exams', [
            'certification' => $certification,
            'relatedExams' => $relatedExams,
            'banner' => $banner
        ]);
    }
}
