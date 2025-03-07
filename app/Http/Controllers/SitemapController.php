<?php

namespace App\Http\Controllers;

use App\Models\SingleCertificate;
use App\Models\SingleExam;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SitemapController extends Controller
{
    // Maximum URLs per sitemap page
    protected $limit = 1000;

    /**
     * Merged sitemap index for both exam questions and exam providers.
     */
    public function index(Request $request)
    {
        // --- Exam Questions Sitemap Entries ---
        $totalExams = SingleExam::count();
        $examPagesCount = (int) ceil($totalExams / $this->limit);
        $examPages = [];
        for ($i = 1; $i <= $examPagesCount; $i++) {
            $examPages[] = [
                'loc' => url("/exam-questions-{$i}/sitemap.xml"),
                'lastmod' => Carbon::now()->format('Y-m-d'),
            ];
        }

        // --- Vendor Sitemap Entries ---
        $totalVendors = Vendor::count();
        $vendorPagesCount = (int) ceil($totalVendors / $this->limit);
        $vendorPages = [];
        for ($i = 1; $i <= $vendorPagesCount; $i++) {
            $vendorPages[] = [
                'loc' => url("/exam-provider-{$i}/sitemap.xml"),
                'lastmod' => Carbon::now()->format('Y-m-d'),
            ];
        }

        // --- Certificates Sitemap Entries ---
        $totalCertificates = SingleCertificate::count();
        $certificatePagesCount = (int) ceil($totalCertificates / $this->limit);
        $certificatePages = [];
        for ($i = 1; $i <= $certificatePagesCount; $i++) {
            $certificatePages[] = [
                'loc' => url("/vendor-exam-questions-{$i}/sitemap.xml"),
                'lastmod' => Carbon::now()->format('Y-m-d'),
            ];
        }

        // --- Training Courses Sitemap Entries ---
        $totalCourses = \App\Models\SingleTrainingCourse::count();
        $trainingCoursePagesCount = (int) ceil($totalCourses / $this->limit);
        $trainingCoursePages = [];
        for ($i = 1; $i <= $trainingCoursePagesCount; $i++) {
            $trainingCoursePages[] = [
                'loc' => url("/training-course-{$i}/sitemap.xml"),
                'lastmod' => Carbon::now()->format('Y-m-d'),
            ];
        }

        return response(
            view('sitemaps.sitemap_index', compact('examPages', 'vendorPages', 'certificatePages', 'trainingCoursePages'))->render(),
            200
        )->header('Content-Type', 'application/xml');
    }

    public function examQuestions(Request $request, $page)
    {
        $totalExams = SingleExam::count();
        $pages = (int) ceil($totalExams / $this->limit);

        if ($page < 1 || $page > $pages) {
            abort(404);
        }

        $offset = ($page - 1) * $this->limit;
        $exams = SingleExam::orderBy('id')->skip($offset)->take($this->limit)->get();

        $urls = [];
        foreach ($exams as $exam) {
            $lastmod = $exam->exam_update_date
                ? Carbon::parse($exam->exam_update_date)->toAtomString()
                : $exam->updated_at->toAtomString();

            $urls[] = [
                'loc' => url("/exam-questions/{$exam->vendor_perma}/{$exam->exam_perma}"),
                'lastmod' => $lastmod,
                'priority' => '0.8',
            ];
        }

        $xml = view('sitemaps.sitemap_exam_questions_page', compact('urls'))->render();
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate a sitemap page for exam providers.
     * URL example: /exam-provider-{page}/sitemap.xml
     */
    public function examProviders(Request $request, $page)
    {
        $totalVendors = Vendor::count();
        $pages = (int) ceil($totalVendors / $this->limit);

        if ($page < 1 || $page > $pages) {
            abort(404);
        }

        $offset = ($page - 1) * $this->limit;
        $vendors = Vendor::orderBy('vendor_id')->skip($offset)->take($this->limit)->get();

        $urls = [];
        foreach ($vendors as $vendor) {
            $lastmod = $vendor->updated_at
                ? Carbon::parse($vendor->updated_at)->toAtomString()
                : Carbon::now()->toAtomString();

            $urls[] = [
                'loc' => url("/exam-provider/{$vendor->vendor_perma}"),
                'lastmod' => $lastmod,
                'priority' => '0.8',
            ];
        }

        $xml = view('sitemaps.sitemap_exam_provider_page', compact('urls'))->render();
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function certificates(Request $request, $page)
    {
        $totalCertificates = SingleCertificate::count();
        $pages = (int) ceil($totalCertificates / $this->limit);

        if ($page < 1 || $page > $pages) {
            abort(404);
        }

        $offset = ($page - 1) * $this->limit;
        $certificates = SingleCertificate::orderBy('cert_id')->skip($offset)->take($this->limit)->get();

        $urls = [];
        foreach ($certificates as $certificate) {
            $lastmod = $certificate->updated_at
                ? Carbon::parse($certificate->updated_at)->toAtomString()
                : Carbon::now()->toAtomString();

            $urls[] = [
                'loc' => url("/vendor-exam-questions/{$certificate->vendor_perma}/{$certificate->cert_perma}"),
                'lastmod' => $lastmod,
                'priority' => '0.8',
            ];
        }

        $xml = view('sitemaps.sitemap_certificates_page', compact('urls'))->render();
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function trainingCourses(Request $request, $page)
    {
        $totalCourses = \App\Models\SingleTrainingCourse::count();
        $pages = (int) ceil($totalCourses / $this->limit);

        if ($page < 1 || $page > $pages) {
            abort(404);
        }

        $offset = ($page - 1) * $this->limit;
        $courses = \App\Models\SingleTrainingCourse::orderBy('course_id')
            ->skip($offset)
            ->take($this->limit)
            ->get();

        $urls = [];
        foreach ($courses as $course) {
            $lastmod = $course->updated_at
                ? Carbon::parse($course->updated_at)->toAtomString()
                : Carbon::now()->toAtomString();

            $urls[] = [
                'loc' => url("/training-course/{$course->perma}"),
                'lastmod' => $lastmod,
                'priority' => '0.8',
            ];
        }

        $xml = view('sitemaps.sitemap_training_course_page', compact('urls'))->render();
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

}
