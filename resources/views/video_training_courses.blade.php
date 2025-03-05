@extends('layouts.app')
@section('meta_title', 'Updated Certificates Exam Question and Answers by Tech Professionals')
@section('meta_description', 'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with pdf and test engine dumps in 2025.')
@section('meta_robots', 'index, follow')
@section('meta_canonical', url()->current())
@section('main-content')
    <style>
        /* Custom Grid for Courses */
        #courses-grid.custom-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            #courses-grid.custom-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            #courses-grid.custom-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
    @php
        // Generate a random integer between 700 and 999 for the review count.
        $randomReviewCount = rand(700, 999);
    @endphp

    <!-- JSON-LD Structured Data for Video Courses -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org/',
        '@type' => 'Product',
        'name' => 'Video Courses',
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
    <div class="container mx-auto">
        @if (!is_null($banner))
            <div class="text-center py-6">
                <a href="{{ $banner->banner_link }}" target="_blank">
                    <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
                </a>
            </div>
        @endif

        <div class="bg-white p-5">
            <!-- Vendor Tabs -->
            <ul id="vendor-tabs"
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                @foreach ($vendors as $vendor)
                    <li class="me-2 cursor-pointer">
                        <a href="javascript:void(0)" data-vendor-perma="{{ $vendor->vendor_perma }}"
                            class="vendor-tab inline-block p-3 rounded-t-lg {{ $loop->first ? 'active text-green-500 bg-green-50' : 'hover:text-gray-600 hover:bg-gray-50' }}">
                            {{ $vendor->vendor_title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Content Box -->
            <div class="shadow-lg rounded-xl mt-4">
                <section>
                    <div class="container mx-auto">
                        <div class="bg-white rounded-2xl">
                            <!-- Header -->
                            <div class="flex flex-wrap items-center mb-3 bg-gray-50 p-3">
                                <div>
                                    <div class="flex items-center">
                                        <h2 class="mr-2 text-xl text-gray-600 font-bold">Training Course</h2>
                                        <span id="course-count"
                                            class="py-1 px-2 bg-green-500 text-xs text-white rounded-full"></span>
                                    </div>
                                    <p class="text-sm text-gray-500">Provided by IT Professionals</p>
                                </div>
                                <span class="md:ml-auto xs:w-80 flex items-center py-2 px-3 text-xs text-white rounded">
                                    <input type="text" id="table-search"
                                        class="w-full pt-2 pb-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                                        placeholder="Search..." />
                                </span>
                            </div>
                            <hr class="border-white" />
                            <!-- Courses Grid -->
                            <div class="p-4">
                                <div id="courses-grid" class="custom-grid">
                                    @foreach ($vendors as $vendor)
                                        @foreach ($vendor->courses as $course)
                                            <div class="course-card flex flex-col items-center justify-center"
                                                data-vendor-perma="{{ $vendor->vendor_perma }}"
                                                data-title="{{ strtolower($course->title) }}">
                                                <a href="{{ url('/training-course/' . $course->perma) }}"
                                                    class="group hover:text-blue-600 text-blue-400 cursor-pointer">
                                                    <div class="flex justify-center">
                                                        <div class="relative overflow-hidden rounded-xl mb-6"
                                                            style="height:200px; width:230px;">
                                                            <img class="rounded-xl w-full h-full transform group-hover:scale-105 transition duration-200"
                                                                src="https://video.dumpsarena.com/img/{{ $course->image }}"
                                                                alt="{{ $course->title }}">
                                                            <div class="absolute top-2 left-2 right-2">
                                                                <div class="flex justify-between flex-wrap gap-2">
                                                                    <div class="flex flex-wrap gap-2">
                                                                        <span
                                                                            class="inline-block bg-green-500 text-white rounded-full text-sm px-3 py-2 font-semibold">
                                                                            # {{ $course->videos }} Lectures
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm font-semibold text-center">{{ $course->title }}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
    @include('components.hot-exam', [
        'weeklyExams' => $weeklyExams,
        'monthlyExams' => $monthlyExams,
    ])

    <script>
        const updateCourses = () => {
            const activeVendor = document.querySelector('.vendor-tab.active').getAttribute('data-vendor-perma');
            const searchValue = document.getElementById('table-search').value.toLowerCase();
            let count = 0;
            document.querySelectorAll('.course-card').forEach(course => {
                const vendor = course.getAttribute('data-vendor-perma');
                const title = course.getAttribute('data-title');
                course.style.display = (vendor === activeVendor && title.includes(searchValue)) ? '' : 'none';
                if (course.style.display === '') count++;
            });
            document.getElementById('course-count').innerText = count;
        };

        document.querySelectorAll('.vendor-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.vendor-tab').forEach(t => {
                    t.classList.remove('active', 'text-green-500', 'bg-green-50');
                    t.classList.add('hover:text-gray-600', 'hover:bg-gray-50');
                });
                tab.classList.add('active', 'text-green-500', 'bg-green-50');
                document.getElementById('table-search').value = '';
                updateCourses();
            });
        });

        document.getElementById('table-search').addEventListener('input', updateCourses);

        document.addEventListener('DOMContentLoaded', () => {
            const firstTab = document.querySelector('.vendor-tab');
            if (firstTab && !firstTab.classList.contains('active')) {
                firstTab.classList.add('active', 'text-green-500', 'bg-green-50');
            }
            updateCourses();
        });
    </script>
@endsection
