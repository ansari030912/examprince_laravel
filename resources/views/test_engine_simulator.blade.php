@extends('layouts.app')
@section('main-content')
    <section class="pb-12 pt-6 bg-cover bg-fixed" style="background-image: url('/bg-img-1.jpg');">
        @if (!is_null($banner))
            <div class="banner-container text-center py-6">
                <a href="{{ $banner->banner_link }}" target="_blank">
                    <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
                </a>
            </div>
        @endif
        <h2
            style="margin: 0; font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 700; font-size: 35px; line-height: 1.2; letter-spacing: -0.00833em; text-align: center; color: #2d3748;">
            HOW TO OPEN TEST ENGINE .examprince FILES</h2>

        <p
            style="margin: 0; font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 600; font-size: 24px; line-height: 1.43; letter-spacing: 0.01071em; text-align: center; margin-top: 12px; color: #4a5568;">
            Prepare, study, and ace your certification exam effortlessly with everything you need. <br /> Enjoy 90 days of
            free updates and ensure 100% success on your first attempt.</p>

        <div class="relative py-12 overflow-hidden">
            <div class="relative container mx-auto px-4">
                <div class="flex flex-wrap -mx-4" style="margin-top: -24px; margin-left: -24px;">
                    <!-- Left column (features and download buttons) remains unchanged -->
                    <div class="w-full lg:w-4/12 px-4 mb-2 lg:mb-0" style="padding-top: 24px; padding-left: 24px;">
                        <div class="px-4 md:px-8 py-9 bg-white">
                            <ul class="mb-5">
                                <li class="py-5 px-6 border-b">
                                    <span class="flex items-center text-lg font-bold font-heading hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-5" width="34" height="34"
                                            viewBox="0 0 48 48">
                                            <g fill="none" stroke="currentColor" stroke-linejoin="round"
                                                stroke-width="4">
                                                <path
                                                    d="M6 9.256L24.009 4L42 9.256v10.778A26.316 26.316 0 0 1 24.003 45A26.32 26.32 0 0 1 6 20.029z">
                                                </path>
                                                <path stroke-linecap="round" d="m15 23l7 7l12-12"></path>
                                            </g>
                                        </svg>
                                        <span class="text-base">Authentic exam simulation</span>
                                    </span>
                                </li>
                                <li class="py-5 px-6 border-b">
                                    <span class="flex items-center text-lg font-bold font-heading hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-5" width="34" height="34"
                                            viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                d="M2 6h2v20H2zm4-2h2v24H6zm8 18h12v2H14zm0-6h12v2H14z"></path>
                                            <path fill="currentColor"
                                                d="m29.7 9.3l-7-7c-.2-.2-.4-.3-.7-.3H12c-1.1 0-2 .9-2 2v24c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V10c0-.3-.1-.5-.3-.7M22 4.4l5.6 5.6H22zM28 28H12V4h8v6c0 1.1.9 2 2 2h6z">
                                            </path>
                                        </svg>
                                        <span class="text-base">Multiple question provided</span>
                                    </span>
                                </li>
                                <li class="py-5 px-6 border-b">
                                    <span class="flex items-center text-lg font-bold font-heading hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-5" width="34" height="34"
                                            viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                d="M9.268 4.66c.3.299.788.299 1.089 0c.3-.298.3-.782 0-1.081a.774.774 0 0 0-1.09 0a.76.76 0 0 0 0 1.081M1.536 6.33a1.99 1.99 0 0 0 0 2.83l3.31 3.289a2.02 2.02 0 0 0 2.154.45v-1.177l-.019.02c-.393.39-1.03.39-1.423 0l-3.31-3.29a.996.996 0 0 1 0-1.415l4.76-4.73a1 1 0 0 1 .707-.293L10.979 2a1.003 1.003 0 0 1 1.01 1.008l-.014 2.03c.36.057.699.178 1.004.351l.017-2.374A2.007 2.007 0 0 0 10.975 1l-3.264.014a2.02 2.02 0 0 0-1.416.586zM9.5 8v1H9a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-.5V8a2 2 0 1 0-4 0m1 1V8a1 1 0 1 1 2 0v1zm1 2.25a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5">
                                            </path>
                                        </svg>
                                        <span class="text-base">Personalized exam mode options</span>
                                    </span>
                                </li>
                                <li class="py-5 px-6 border-b">
                                    <span class="flex items-center text-lg font-bold font-heading hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-5" width="34" height="34"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.088 6.412a2.84 2.84 0 0 0-1.347-.955l-1.378-.448a.544.544 0 0 1 0-1.025l1.378-.448A2.84 2.84 0 0 0 16.5 1.774l.011-.034l.448-1.377a.544.544 0 0 1 1.027 0l.447 1.377a2.84 2.84 0 0 0 1.799 1.796l1.377.448l.028.007a.544.544 0 0 1 0 1.025l-1.378.448a2.84 2.84 0 0 0-1.798 1.796l-.448 1.377l-.013.034a.544.544 0 0 1-1.013-.034l-.448-1.377a2.8 2.8 0 0 0-.45-.848m7.695 3.801l-.766-.248a1.58 1.58 0 0 1-.998-.999l-.25-.764a.302.302 0 0 0-.57 0l-.248.764a1.58 1.58 0 0 1-.984.999l-.765.248a.302.302 0 0 0 0 .57l.765.249a1.58 1.58 0 0 1 1 1.002l.248.764a.302.302 0 0 0 .57 0l.249-.764a1.58 1.58 0 0 1 .999-.999l.765-.248a.302.302 0 0 0 0-.57zM9.909 3.7a3.87 3.87 0 0 1 2.818-.544a1.7 1.7 0 0 0-.447.413a1.6 1.6 0 0 0-.275 1.018a2.4 2.4 0 0 0-1.287.375L3.63 9.506l7.071 4.62c.79.515 1.809.515 2.598 0l4.75-3.103q.058.146.151.276c.155.221.376.389.63.48l.54.171l-.37.243v5.557a.75.75 0 0 1-.15.45l-.001.001l-.001.002l-.003.004l-.009.01l-.015.02l-.01.013l-.086.101a5 5 0 0 1-.317.33c-.277.267-.69.614-1.25.958C16.037 20.329 14.339 21 12 21s-4.036-.67-5.159-1.361a7.4 7.4 0 0 1-1.25-.957a5 5 0 0 1-.316-.33a3 3 0 0 1-.124-.15L5.15 18.2a.75.75 0 0 1-.15-.45v-5.557l-2-1.307v5.364a.75.75 0 0 1-1.5 0V9.5a.75.75 0 0 1 .358-.64zm4.21 11.681a3.88 3.88 0 0 1-4.238 0L6.5 13.172v4.297q.055.058.13.13c.211.203.54.481.997.762c.909.56 2.337 1.139 4.373 1.139s3.464-.58 4.373-1.139a6 6 0 0 0 1.127-.892v-4.297z">
                                            </path>
                                        </svg>
                                        <span class="text-base">Complete exams in a single file</span>
                                    </span>
                                </li>
                                <li class="py-5 px-6 border-b">
                                    <span class="flex items-center text-lg font-bold font-heading hover:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-5" width="34" height="34"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M3 12a3.5 3.5 0 0 1 3.5-3.5c1.204 0 2.02.434 2.7 1.113c.726.727 1.285 1.72 1.926 2.873l.034.06c.6 1.082 1.283 2.311 2.227 3.255c1.008 1.008 2.316 1.699 4.113 1.699a5.5 5.5 0 1 0-4.158-9.1a23.58 23.58 0 0 1 1.122 1.857A3.5 3.5 0 1 1 17.5 15.5c-1.203 0-2.02-.434-2.7-1.113c-.726-.727-1.285-1.72-1.926-2.873l-.034-.06c-.6-1.082-1.283-2.311-2.227-3.255C9.605 7.191 8.297 6.5 6.5 6.5a5.5 5.5 0 1 0 4.158 9.1a23.577 23.577 0 0 1-1.122-1.857A3.5 3.5 0 0 1 3 12">
                                            </path>
                                        </svg>
                                        <span class="text-base">Unlimited access to exam files</span>
                                    </span>
                                </li>
                            </ul>
                            <div class="mt-8 -pb-6">
                                <a type="button"
                                    class="text-gray-700 flex justify-center border-2 hover:bg-gray-700 hover:text-white border-gray-700 font-medium text-sm px-5 py-2.5 text-center me-2 mb-2"
                                    href="https://releases.examprince.com/ExamPrinceTestEngine.zip">
                                    <b style="text-align:center">Download for windows (.zip)</b>
                                </a>
                                <a type="button"
                                    class="text-gray-700 flex justify-center border-2 hover:bg-gray-700 hover:text-white border-gray-700 font-medium text-sm px-5 py-2.5 text-center me-2 mb-2"
                                    href="https://releases.examprince.com/ExamPrinceTestEngine.exe">
                                    <b>Download for windows (.exe)</b>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right column (image slider) -->
                    <div class="w-full lg:w-8/12 px-2" style="padding-top: 24px; padding-left: 24px;">
                        <div class="flex flex-wrap h-full">
                            <div class="w-full">
                                <div class="relative">
                                    <div class="overflow-hidden" style="height: full;"> <!-- Set a fixed height -->
                                        <div id="slideContainer" class="flex transition-transform duration-500 ease-in-out"
                                            style="transform: translateX(0%);">
                                            <div class="w-full h-full flex-shrink-0">
                                                <img src="/test-engine/slide1_optimized.png" alt="Slide 1"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div class="w-full h-full flex-shrink-0">
                                                <img src="/test-engine/slide2_optimized.png" alt="Slide 2"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div class="w-full h-full flex-shrink-0">
                                                <img src="/test-engine/slide3_optimized.png" alt="Slide 3"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div class="w-full h-full flex-shrink-0">
                                                <img src="/test-engine/slide4_optimized.png" alt="Slide 4"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                            <div class="w-full h-full flex-shrink-0">
                                                <img src="/test-engine/slide5_optimized.png" alt="Slide 5"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                    </div>
                                    <button id="prevButton"
                                        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white bg-opacity-50 rounded-full p-2 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button id="nextButton"
                                        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white bg-opacity-50 rounded-full p-2 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="text-center border border-gray-700 font-bold mt-2 p-3 bg-white">
                                    <p
                                        style="margin: 0; font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; font-size: 1rem; line-height: 1.5; letter-spacing: 0.00938em;">
                                        <b>version 2.0.15</b>
                                    </p>
                                    <p
                                        style="margin: 0; font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; font-size: 1rem; line-height: 1.5; letter-spacing: 0.00938em;">
                                        <b>(required Win 8, Win 8.1 or Win 10)</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slideContainer = document.getElementById('slideContainer');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            const slides = slideContainer.children;
            let currentIndex = 0;

            function showSlide(index) {
                if (index < 0) index = slides.length - 1;
                if (index >= slides.length) index = 0;
                slideContainer.style.transform = `translateX(-${index * 100}%)`;
                currentIndex = index;
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            nextButton.addEventListener('click', nextSlide);
            prevButton.addEventListener('click', prevSlide);

            // Auto-slide every 3 seconds
            setInterval(nextSlide, 3000);
        });
    </script>
@endsection
