@extends('layouts.app')
@section('meta_title', 'Updated Certificates Exam Question and Answers by Tech Professionals')
@section(
    'meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with pdf and test engine dumps in 2025.'
)
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
        'name' => 'Updated Certificates Exam Question and Answers by Tech Professionals',
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
            <div class="banner-container text-center py-6">
                <a href="{{ $banner->banner_link }}" target="_blank">
                    <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
                </a>
            </div>
        @endif


        <div class="bg-white p-5">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                <li class="me-2 cursor-pointer">
                    <span id="vendorsTab" onclick="showTab('vendors')"
                        class="inline-block p-3 rounded-t-lg text-blue-600 bg-gray-200">
                        Vendors &amp; Certifications
                    </span>
                </li>
                <li class="me-2 cursor-pointer">
                    <span id="hotExamsTab" onclick="showTab('hotExams')"
                        class="inline-block p-3 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">
                        Hot Exams
                    </span>
                </li>
            </ul>

            <!-- Vendors & Certifications Section -->
            <div id="vendorsSection" class="relative shadow-md sm:rounded-lg"
                style="box-shadow: inset 0px 0px 8px rgba(0, 0, 0, 0.3)">
                <div class="pb-4 bg-white pl-3 w-full pt-4">
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 pb-2 ps-10 text-sm text-gray-700 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-600 focus:border-blue-500"
                            placeholder="Search..." onkeyup="filterVendors()" />
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Vendors</th>
                                <th scope="col" class="px-6 py-3 text-right">Exams</th>
                            </tr>
                        </thead>
                        <tbody id="vendorTable">
                            @foreach ($vendors as $vendor)
                                <tr class="vendorRow bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-lg text-blue-500 hover:underline whitespace-nowrap">
                                        <a href="{{ url('/exam-provider/' . $vendor->vendor_perma) }}">
                                            {{ $vendor->vendor_title ?? 'Unknown Vendor' }}
                                        </a>
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <span class="hidden md:inline-block font-medium text-gray-600">
                                            Total <b class="text-green-500">( {{ $vendor->vendor_exams }} )</b>
                                            {{ $vendor->vendor_exams > 1 ? 'Exams' : 'Exam' }} are in
                                            <b>{{ $vendor->vendor_title ?? 'Unknown Vendor' }}</b>
                                        </span>
                                        <span class="md:hidden font-medium text-gray-600">
                                            <b class="text-green-500">( {{ $vendor->vendor_exams }} )</b>
                                            {{ $vendor->vendor_exams > 1 ? 'Exams' : 'Exam' }}
                                        </span>
                                        <br />
                                        <span class="font-medium text-blue-600 hover:underline cursor-pointer">
                                            <a href="{{ url('/exam-provider/' . $vendor->vendor_perma) }}">
                                                View
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Hot Exams Section (Initially Hidden) -->
            <div id="hotExamsSection" class="hidden">
                @include('components.hot-exam', [
                    'weeklyExams' => $weeklyExams,
                    'monthlyExams' => $monthlyExams,
                ])
            </div>

        </div>
    </div>

    <script>
        function filterVendors() {
            let searchValue = document.getElementById("table-search").value.toLowerCase();
            let rows = document.querySelectorAll(".vendorRow");

            rows.forEach(row => {
                let vendorName = row.querySelector("th a").textContent.toLowerCase();
                row.style.display = vendorName.includes(searchValue) ? "" : "none";
            });
        }

        function showTab(tab) {
            let vendorsTab = document.getElementById("vendorsTab");
            let hotExamsTab = document.getElementById("hotExamsTab");
            let vendorsSection = document.getElementById("vendorsSection");
            let hotExamsSection = document.getElementById("hotExamsSection");

            if (tab === "vendors") {
                vendorsSection.classList.remove("hidden");
                hotExamsSection.classList.add("hidden");

                vendorsTab.classList.add("text-blue-600", "bg-gray-200");
                hotExamsTab.classList.remove("text-blue-600", "bg-gray-200");
            } else {
                hotExamsSection.classList.remove("hidden");
                vendorsSection.classList.add("hidden");

                hotExamsTab.classList.add("text-blue-600", "bg-gray-200");
                vendorsTab.classList.remove("text-blue-600", "bg-gray-200");
            }
        }
    </script>
@endsection
