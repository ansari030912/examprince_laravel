<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Certificate;
use App\Models\Exam;
use App\Models\ExamCertificate;
use App\Models\HotExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamProviderController extends Controller
{
    public function index()
    {
        // Fetching vendors
        $vendors = DB::table('vendors')
            ->select('vendor_id', 'vendor_title', 'vendor_perma', 'vendor_img', 'vendor_exams')
            ->get();

        // Fetching hot exams
        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();

        $banner = Banner::orderBy('created_at', 'desc')->first(); // Fetch latest banner

        return view('exam_providers', compact('vendors', 'weeklyExams', 'monthlyExams', 'banner'));
    }

    public function getExamsByVendorPerma($vendorPerma)
    {
        // Log vendor perma for debugging
        \Log::info("Fetching exams and certifications for vendor: " . $vendorPerma);

        // Find vendor by vendor_perma
        $vendor = DB::table('vendors')->where('vendor_perma', $vendorPerma)->first();

        // If vendor not found, return a 404 response
        if (!$vendor) {
            abort(404, "Vendor not found");
        }

        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();
        // Fetch exams related to the vendor_id
        $exams = DB::table('exams')->where('vendor_id', $vendor->vendor_id)->get();

        // Fetch all certification IDs related to the vendor from exam_certificates table
        $certIds = ExamCertificate::where('vendor_id', $vendor->vendor_id)->pluck('cert_id')->unique();
        $certifications = Certificate::whereIn('cert_id', $certIds)->get();

        $banner = Banner::orderBy('created_at', 'desc')->first(); // Fetch latest banner
        // Return the view with exams and certifications
        return view('exams_by_vendor', compact('vendor', 'exams', 'certifications', 'banner', 'weeklyExams', 'monthlyExams', ));
    }

}
