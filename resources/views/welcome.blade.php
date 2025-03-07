@extends('layouts.app')

@section('meta_title', 'Updated Exam Questions and Answers by Tech Professionals')
@section('meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.')
@section('meta_robots', 'index, follow')
@section('meta_canonical', url()->current())

@section('main-content')
    @php
        // Generate a random integer between 700 and 999
        $randomReviewCount = rand(700, 999);
    @endphp

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org/',
        '@type' => 'Product',
        'name' => 'Exam Prince',
        'description' => 'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT certification Exams. Pass your certification exam easily with pdf and test engine dumps in 2025.',
        'review' => [
            '@type' => 'Review',
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => 4,
                'bestRating' => 5,
            ],
            'author' => [
                '@type' => 'Person',
                'name' => 'Fred Benson',
            ],
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => 4.4,
            'reviewCount' => $randomReviewCount,
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @include('components.home-section')
    @include('components.logo-banner')
    @include('components.recently-added')
    @include('components.test-engine-scroll')
    @include('components.hot-exam', [
        'weeklyExams' => $weeklyExams,
        'monthlyExams' => $monthlyExams,
    ])
    @include('components.home-certificates')
    @include('components.testimonial-carousel')

@endsection
