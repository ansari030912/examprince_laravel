<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HotExam;
use Illuminate\Http\Request;
use App\Models\SingleExam;
use App\Models\ExamPrice;
use App\Models\TeImage;
use App\Models\ExamTopic;
use App\Models\QuestionType;
use App\Models\ExamFaq;
use Illuminate\Routing\Controller;

class ExamsPageController extends Controller
{
    public function show($vendor_perma, $exam_perma)
    {
        // Fetch exam details
        $exam = SingleExam::where('exam_perma', $exam_perma)->first();

        if (!$exam) {
            return abort(404, 'Exam not found');
        }

        // Fetch related data using exam_id
        $examStats = [
            'exam_last_week_word_to_word' => $exam->exam_last_week_word_to_word ?? 0, // Default to 0 if null
            'exam_last_week_average_score' => $exam->exam_last_week_average_score ?? 0, // Default to 0 if null
            'exam_popularity' => rand(100000, 1200000),
            'exam_sales' => rand(5000, 35000),
        ];

        $banner = Banner::latest()->first();
        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();
        $decodedContent = html_entity_decode($exam->exam_article ?? '');
        $examDetails = [
            'exam' => $exam,
            'examPrices' => ExamPrice::where('exam_id', $exam->exam_id)->get(),
            'teImages' => TeImage::where('exam_id', $exam->exam_id)->get(),
            'exam_topics' => ExamTopic::where('exam_id', $exam->exam_id)->get(),
            'exam_question_types' => QuestionType::where('exam_id', $exam->exam_id)->get(),
            'examFaqs' => ExamFaq::where('exam_id', $exam->exam_id)->get(),
            'examCerts' => json_decode($exam->exam_certs, true),
        ];

        return view('single_exam', compact('examDetails', 'banner', 'monthlyExams', 'weeklyExams', 'examStats', 'decodedContent'));
    }

}
