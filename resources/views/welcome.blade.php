@extends('layouts.app')
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
