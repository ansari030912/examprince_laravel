@extends('layouts.app')

@section('meta_title', 'Updated Exam Questions and Answers by Tech Professionals')
@section('meta_description', 'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.')
@section('meta_robots', 'index, follow')
@section('meta_canonical', url()->current())

@section('main-content')
    @include('components.home-section')
    @include('components.logo-banner')
    @include('components.recently-added')
    @include('components.test-engine-scroll')

    @include('components.hot-exam', [
        'weeklyExams' => $weeklyExams,
        'monthlyExams' => $monthlyExams,
    ])
    @include('components.home-certificates')
@endsection
