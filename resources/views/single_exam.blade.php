@extends('layouts.app')
@section('meta_title', 'Updated ' . $examDetails['exam']->exam_title . ' Exam Question and Answers by Tech
    Professionals')
@section('meta_description', 'Examprince is a premium provider of Real and Valid Exam Question and Answers of ' .
    $examDetails['exam']->exam_title . ' IT certification Exams. Pass your certification exam easily with pdf and test
    engine dumps in 2025 and become certified professional.')
@section('meta_robots', !$examDetails['exam']->index_tag ? 'index, follow' : 'noindex, nofollow')
@section('meta_canonical', url()->current())

@section('main-content')
    <section class="overflow-x-hidden">

        @include('components.exam_page_top')
        @include('components.exam-te-images')
        @include('components.exam-topics-and-questions')
        @include('components.hot-exam', [
            'weeklyExams' => $weeklyExams,
            'monthlyExams' => $monthlyExams,
        ])
        @include('components.logo-banner')
        @include('components.article')

    </section>
    <script>
        // We'll convert $examDetails to JSON and log it
        console.log(@json($examDetails));
    </script>
@endsection
