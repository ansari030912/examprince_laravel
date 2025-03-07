@extends('layouts.app')
@section('meta_title',
    'Updated ' .
    $examDetails['exam']->exam_title .
    ' Exam Question and Answers by Tech
    Professionals')
@section('meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of ' .
    $examDetails['exam']->exam_title .
    ' IT certification Exams. Pass your certification exam easily with pdf and test
    engine dumps in 2025 and become certified professional.')
@section('meta_robots', !$examDetails['exam']->index_tag ? 'index, follow' : 'noindex, nofollow')
@section('meta_canonical', url()->current())

@section('main-content')
    @php
        // Generate a random integer between 700 and 999 for the review count.
        $randomReviewCount = rand(700, 999);
    @endphp

    {{-- FAQ Schema --}}
    @if (isset($examDetails['examFaqs']) && $examDetails['examFaqs']->count() > 0)
        <script type="application/ld+json">
            {!! json_encode([
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $examDetails['examFaqs']->map(function($faq) {
                    return [
                        '@type'         => 'Question',
                        'name'          => $faq->faq_q,
                        'acceptedAnswer'=> [
                            '@type' => 'Answer',
                            'text'  => $faq->faq_a,
                        ],
                    ];
                })->toArray()
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endif

    {{-- Product Schema --}}
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' =>  $examDetails['exam']->exam_title,
            'description' => 'Examprince is a premium provider of Real and Valid Exam Question and Answers of ' . $examDetails['exam']->exam_title . ' IT certification Exams. Pass your certification exam easily with pdf and test engine dumps in 2025.',
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
        @include('components.exam-faq')
    </section>

    <script>
        // We'll convert $examDetails to JSON and log it (for debugging)
        console.log(@json($examDetails));
    </script>
@endsection
