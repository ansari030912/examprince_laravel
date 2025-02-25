@extends('layouts.app')
@php
    // Use the $certification variable passed from the controller.
    $shouldIndex = isset($certification) && $certification->cert_title !== null;
    $metaTitle = $shouldIndex
        ? "Updated {$certification->cert_title} Exam Questions and Answers by Tech Professionals"
        : 'Updated Exam Questions and Answers by Tech Professionals';
    $metaDescription = $shouldIndex
        ? "Examprince is a premium provider of Real and Valid Exam Questions and Answers of {$certification->cert_title} IT certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025 and become a certified professional."
        : 'Examprince is a premium provider of Real and Valid Exam Questions and Answers of IT certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.';
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_robots', $shouldIndex ? 'index, follow' : 'noindex, nofollow')
@section('meta_canonical', url()->current()) {{-- or hardcode 'https://examprince.com' if needed --}}


@section('main-content')
    @if (!is_null($banner))
        <div class="banner-container text-center py-6">
            <a href="{{ $banner->banner_link }}" target="_blank">
                <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
            </a>
        </div>
    @endif

    @include('components.exam-page-top-details')
    <section class="my-10 px-6 bg-white">
        <div class="container mx-auto">
            <div class="flex flex-wrap -m-4 mb-12">
                <!-- Left Column - Image -->
                <div class="w-full lg:w-4/12 p-12">
                    <div class="flex items-end gap-2">
                        <span class="group flex-1" style="display: flex; justify-content: center;">
                            <div class="relative xl:hidden overflow-hidden rounded-xl flex flex-col justify-center transition duration-200"
                                style="height: 230px; width: 250px;">
                                <img style="width: 250px; height: 230px;"
                                    class="absolute inset-0 rounded-xl transform group-hover:scale-105 transition duration-200"
                                    src="/package-small-min_optimized.png" alt="{{ $certification->cert_title }}" />
                            </div>
                            <div class="relative hidden xl:inline-flex overflow-hidden rounded-xl flex-col justify-center transition duration-200"
                                style="height: 300px; width: 420px;">
                                <img style="width: 420px; height: 300px;"
                                    class="absolute inset-0 rounded-xl transform group-hover:scale-105 transition duration-200"
                                    src="/package-small-min_optimized.png" alt="{{ $certification->cert_title }}" />
                            </div>
                        </span>
                    </div>
                </div>

                <!-- Right Column - Details -->
                <div class="w-full lg:w-8/12 p-4">
                    <div class="p-2 md:p-10">
                        <h2 class="font-heading font-bold text-gray-600 uppercase text-3xl mb-2 max-w-2xl">
                            {{ $certification->cert_title }} Certification Provided by IT Professionals
                        </h2>
                        <hr class="mb-4" style="border: 2px solid #F5F6FA" />

                        <p class="text-gray-500 text-base font-semibold max-w-xl">
                            Reliable Study Materials & Testing Engine for {{ $certification->cert_full_name }}
                            Certification Success!
                        </p>
                        <p class="text-gray-500  text-base font-semibold max-w-xl">
                            Exams Provider:
                            {{-- <a href="/exam-provider/{{ $exam->exam_vendor_perma }}" class="hover:underline">
                                {{ $exam->exam_vendor_title }}
                            </a> --}}
                            @if ($relatedExams->isNotEmpty())
                                {{-- <p class="text-xl text-blue-500 font-semibold"> --}}
                                <a href="/exam-provider/{{ $relatedExams->first()->exam_vendor_perma }}"
                                    class="text-xl text-blue-500 hover:underline">
                                    {{ $relatedExams->first()->exam_vendor_title }}
                                </a>
                                {{-- </p> --}}
                            @endif
                        </p>
                        <p class="text-gray-500 text-base font-semibold mb-6 max-w-xl">
                            Certification Exam Name: <span
                                class="text-sky-500 text-xl">{{ $certification->cert_full_name }}</span>
                        </p>

                        <!-- Rating Stars -->
                        <div class="flex flex-wrap items-center gap-2">
                            <div class="flex gap-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="#FFB11A">
                                        <path
                                            d="M10.8586 4.71245C11.2178 3.60688 12.7819 3.60688 13.1412 4.71245L14.4246 8.66261C14.5853 9.15703 15.046 9.49179 15.5659 9.49179H19.7193C20.8818 9.49179 21.3651 10.9793 20.4247 11.6626L17.0645 14.1039C16.6439 14.4095 16.4679 14.9512 16.6286 15.4456L17.912 19.3957C18.2713 20.5013 17.0059 21.4207 16.0654 20.7374L12.7052 18.296C12.2846 17.9905 11.7151 17.9905 11.2945 18.296L7.93434 20.7374C6.99388 21.4207 5.72851 20.5013 6.08773 19.3957L7.37121 15.4456C7.53186 14.9512 7.35587 14.4095 6.93529 14.1039L3.57508 11.6626C2.63463 10.9793 3.11796 9.49179 4.28043 9.49179H8.43387C8.95374 9.49179 9.41448 9.15703 9.57513 8.66261L10.8586 4.71245Z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-sm font-semibold">5.0 ({{ $certification->cert_id }} reviews)</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="-mt-10 border-gray-200" />

            <!-- Features Grid -->
            <div class="w-full lg:w-12/12 p-4 px-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="lg:col-span-7">
                        <p class="text-xl text-blue-600">{{ $certification->vendor_title }}</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h6 class="text-2xl text-gray-600 font-semibold text-left">Material</h6>
                                <ul class="list-disc pl-4 text-sm mb-2 text-gray-500 text-left">
                                    <li>Verified By IT Certified Experts</li>
                                    <li>100% Accurate Answers</li>
                                    <li>100% Money Back Guarantee</li>
                                    <li>Instant Downloads</li>
                                    <li>Free Fast Exam Updates</li>
                                </ul>
                            </div>
                            <div>
                                <h6 class="text-2xl text-gray-600 font-semibold text-left">PDF</h6>
                                <ul class="list-disc pl-4 text-sm mb-2 text-gray-500 text-left">
                                    <li>Best Value Available in Market</li>
                                    <li>Try Demo Before You Buy</li>
                                    <li>Secure Shopping Experience</li>
                                    <li>Exam Questions And Answers</li>
                                    <li>99.5% High Success Pass Rate</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h6 class="text-2xl text-gray-600 font-semibold text-left">Exam Questions
                                </h6>
                                <ul class="list-disc pl-4 text-sm mb-2 text-gray-500 text-left">
                                    <li>Up-To-Date Exam Study Material</li>
                                </ul>
                            </div>
                            <div>
                                <h6 class="text-2xl text-gray-600 font-semibold text-left">Safe Files
                                </h6>
                                <ul class="list-disc pl-4 text-sm mb-2 text-gray-500 text-left">
                                    <li>Guaranteed To Have Actual PDF</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Sale Countdown -->
                        <div class="bg-[#c7dfe8] p-4 rounded-lg text-center mt-4 shadow-inner">
                            <p class="text-xl font-bold">
                                <span class="text-[#856404]">Limited Time Mega Sale!</span><br>
                                <span class="text-red-600">(40-70% OFF)</span>
                            </p>
                            <p class="text-sm font-semibold text-[#856404]">
                                Hurry up! offer ends in <span class="countdown text-red-500" id="countdown"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200" />

                <!-- Related Exams Grid -->
                @if ($relatedExams->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedExams as $exam)
                            <div class="flex flex-col items-center">
                                <a href="{{ url('/exam/' . $exam->exam_perma) }}" class="group hover:text-blue-500">
                                    <div class="flex justify-center">
                                        <div class="relative overflow-hidden rounded-xl mb-6"
                                            style="height: 270px; width: 300px;">
                                            <img class="rounded-xl w-full h-full transform group-hover:scale-105 transition duration-200"
                                                src="/package-small-min_optimized.png" alt="{{ $exam->exam_title }}" />
                                            <div class="absolute top-4 left-4 right-4">
                                                <div class="flex justify-between flex-wrap gap-4">
                                                    <div class="flex flex-wrap gap-2">
                                                        @if ($exam->exam_retired)
                                                            <span
                                                                class="inline-block bg-red-500 text-white rounded-full text-base px-3 py-2 font-semibold">
                                                                Retired Exam
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-block bg-yellow-400 text-white rounded-full text-base px-3 py-2 font-semibold">
                                                                New arrival
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-xl text-blue-500 font-semibold text-center">
                                        {{ $exam->exam_vendor_title }}</p>
                                    <h2
                                        class="font-heading text-gray-500 font-semibold uppercase text-base mb-3 text-center">
                                        {{ $exam->exam_title }}
                                    </h2>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('components.logo-banner')
    @include('components.hot-exam', [
        'weeklyExams' => $weeklyExams,
        'monthlyExams' => $monthlyExams,
    ])

    <script>
        // Countdown Timer
        function updateCountdown() {
            const now = new Date();
            const end = new Date();
            end.setHours(23, 59, 59);

            const diff = end - now;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('countdown').textContent =
                `${hours}h ${minutes}m ${seconds}s`;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
@endsection
