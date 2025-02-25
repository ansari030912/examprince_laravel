@extends('layouts.app')

@section('main-content')
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
                    <span id="examsTab" onclick="showTab('exams')"
                        class="inline-block p-3 rounded-t-lg text-blue-600 bg-gray-200 active-tab">
                        Exams
                    </span>
                </li>
                <li class="me-2 cursor-pointer">
                    <span id="certificationsTab" onclick="showTab('certifications')"
                        class="inline-block p-3 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">
                        Certifications
                    </span>
                </li>
                <li class="me-2 cursor-pointer">
                    <span id="hotExamsTab" onclick="showTab('hotExams')"
                        class="inline-block p-3 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">
                        Hot Exams
                    </span>
                </li>
            </ul>

            <!-- Exams Section -->
            <div id="examsSection" class="relative sm:rounded-lg">
                <div>
                    <div>
                        <div class="flex flex-wrap items-center mb-3 mt-3">
                            <div>
                                <div class="flex items-center">
                                    <h3 class="mr-2 text-xl text-gray-600 font-bold">{{ $vendor->vendor_title }}</h3>
                                    <span
                                        class="py-1 px-2 bg-indigo-500 text-xs text-white rounded-full">{{ count($exams) }}
                                        <!-- --> Exams
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500">Provided by IT Professionals</p>
                            </div>
                            <span class="md:ml-auto xs:w-60 flex items-center py-2 px-3 text-xs text-white rounded">
                                <input type="text" id="table-search"
                                    class="md:block w-70 pt-2 pb-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search Exams..." onkeyup="filterExams()" />


                            </span>
                        </div>

                        @foreach ($exams as $exam)
                            <div class="md:flex md:justify-between md:items-center mb-2 p-4 bg-gray-50 rounded">

                                <div class="flex items-center">
                                    <span
                                        class="inline-flex w-10 h-10 mr-3 justify-center items-center bg-purple-50 rounded">
                                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 12H5C4.73478 12 4.48043 12.1054 4.29289 12.2929C4.10536 12.4804 4 12.7348 4 13C4 13.2652 4.10536 13.5196 4.29289 13.7071C4.48043 13.8946 4.73478 14 5 14H9C9.26522 14 9.51957 13.8946 9.70711 13.7071C9.89464 13.5196 10 13.2652 10 13C10 12.7348 9.89464 12.4804 9.70711 12.2929C9.51957 12.1054 9.26522 12 9 12ZM13 2H11.82C11.6137 1.41645 11.2319 0.910998 10.7271 0.552938C10.2222 0.194879 9.61894 0.00173951 9 0H7C6.38106 0.00173951 5.7778 0.194879 5.27293 0.552938C4.76807 0.910998 4.38631 1.41645 4.18 2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V5C16 4.20435 15.6839 3.44129 15.1213 2.87868C14.5587 2.31607 13.7956 2 13 2ZM6 3C6 2.73478 6.10536 2.48043 6.29289 2.29289C6.48043 2.10536 6.73478 2 7 2H9C9.26522 2 9.51957 2.10536 9.70711 2.29289C9.89464 2.48043 10 2.73478 10 3V4H6V3ZM14 17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H4V5C4 5.26522 4.10536 5.51957 4.29289 5.70711C4.48043 5.89464 4.73478 6 5 6H11C11.2652 6 11.5196 5.89464 11.7071 5.70711C11.8946 5.51957 12 5.26522 12 5V4H13C13.2652 4 13.5196 4.10536 13.7071 4.29289C13.8946 4.48043 14 4.73478 14 5V17ZM11 8H5C4.73478 8 4.48043 8.10536 4.29289 8.29289C4.10536 8.48043 4 8.73478 4 9C4 9.26522 4.10536 9.51957 4.29289 9.70711C4.48043 9.89464 4.73478 10 5 10H11C11.2652 10 11.5196 9.89464 11.7071 9.70711C11.8946 9.51957 12 9.26522 12 9C12 8.73478 11.8946 8.48043 11.7071 8.29289C11.5196 8.10536 11.2652 8 11 8Z"
                                                fill="#707087"></path>
                                        </svg>
                                    </span>
                                    <div>
                                        <a class="hover:underline text-gray-700   hover:text-blue-600"
                                            href="{{ url('/exam-questions/' . $exam->vendor_perma . '/' . $exam->exam_perma) }}">
                                            <h4 class="text-lg font-medium text-blue-500  ">{{ $exam->exam_code }}</h4>
                                            <p class="text-sm font-medium ">{{ $exam->exam_title }}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex md:items-center justify-end gap-2">
                                    <span
                                        class="hidden md:inline-block text-nowrap mr-3 py-1 px-2 bg-indigo-50 text-xs text-indigo-500 rounded-full">
                                        <a href="/exam-questions/aafm/ctep">#
                                            {{ $exam->exam_questions }}
                                            <!-- --> Questions &amp; Answers
                                        </a>
                                    </span>
                                    <span
                                        class="inline-block md:hidden mr-3 py-1 px-2 bg-indigo-50 text-xs text-indigo-500 rounded-full">
                                        <a href="/exam-questions/aafm/ctep">#
                                            {{ $exam->exam_questions }}
                                            <!-- --> Q-&amp;-A
                                        </a>
                                    </span>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>

            <!-- Certifications Section -->
            <div id="certificationsSection" class="hidden">
                <div class="flex flex-wrap items-center mb-3 mt-3">
                    <div>
                        <div class="flex items-center">
                            <h3 class="mr-2 text-xl text-gray-600 font-bold">{{ $vendor->vendor_title }}</h3>
                            <span
                                class="py-1 px-2 bg-indigo-500 text-xs text-white rounded-full">{{ count($certifications) }}
                                <!-- --> Certifications
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">Provided by IT Professionals</p>
                    </div>
                    <span class="md:ml-auto xs:w-50 flex items-center py-2 px-3 text-xs text-white rounded">
                        <input type="text" id="certifications-search"
                            class="md:block w-70 pt-2 pb-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search Certifications..." onkeyup="filterCertifications()" />
                    </span>
                </div>
                @foreach ($certifications as $certification)
                    <div class="md:flex md:justify-between md:items-center mb-2 p-4 bg-gray-50 rounded">

                        <div class="flex items-center">
                            <span class="inline-flex w-10 h-10 mr-3 justify-center items-center bg-purple-50 rounded">
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 12H5C4.73478 12 4.48043 12.1054 4.29289 12.2929C4.10536 12.4804 4 12.7348 4 13C4 13.2652 4.10536 13.5196 4.29289 13.7071C4.48043 13.8946 4.73478 14 5 14H9C9.26522 14 9.51957 13.8946 9.70711 13.7071C9.89464 13.5196 10 13.2652 10 13C10 12.7348 9.89464 12.4804 9.70711 12.2929C9.51957 12.1054 9.26522 12 9 12ZM13 2H11.82C11.6137 1.41645 11.2319 0.910998 10.7271 0.552938C10.2222 0.194879 9.61894 0.00173951 9 0H7C6.38106 0.00173951 5.7778 0.194879 5.27293 0.552938C4.76807 0.910998 4.38631 1.41645 4.18 2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V5C16 4.20435 15.6839 3.44129 15.1213 2.87868C14.5587 2.31607 13.7956 2 13 2ZM6 3C6 2.73478 6.10536 2.48043 6.29289 2.29289C6.48043 2.10536 6.73478 2 7 2H9C9.26522 2 9.51957 2.10536 9.70711 2.29289C9.89464 2.48043 10 2.73478 10 3V4H6V3ZM14 17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H4V5C4 5.26522 4.10536 5.51957 4.29289 5.70711C4.48043 5.89464 4.73478 6 5 6H11C11.2652 6 11.5196 5.89464 11.7071 5.70711C11.8946 5.51957 12 5.26522 12 5V4H13C13.2652 4 13.5196 4.10536 13.7071 4.29289C13.8946 4.48043 14 4.73478 14 5V17ZM11 8H5C4.73478 8 4.48043 8.10536 4.29289 8.29289C4.10536 8.48043 4 8.73478 4 9C4 9.26522 4.10536 9.51957 4.29289 9.70711C4.48043 9.89464 4.73478 10 5 10H11C11.2652 10 11.5196 9.89464 11.7071 9.70711C11.8946 9.51957 12 9.26522 12 9C12 8.73478 11.8946 8.48043 11.7071 8.29289C11.5196 8.10536 11.2652 8 11 8Z"
                                        fill="#707087"></path>
                                </svg>
                            </span>
                            <div>
                                <a class="hover:underline text-gray-700   hover:text-blue-600"
                                    href="{{ url('/vendor-exam-questions/' . $vendor->vendor_perma . '/' . $certification->cert_perma) }}">
                                    <h4 class="text-lg font-medium text-blue-500  ">{{ $certification->cert_title }}
                                    </h4>
                                    <p class="text-sm font-medium ">{{ $certification->cert_name }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex md:items-center justify-end gap-2">
                            <span
                                class="hidden md:inline-block text-nowrap mr-3 py-1 px-2 bg-indigo-50 text-xs text-indigo-500 rounded-full">
                                <a href="/exam-questions/aafm/ctep">#
                                    {{ $certification->cert_id }}

                                </a>
                            </span>
                            <span
                                class="inline-block md:hidden mr-3 py-1 px-2 bg-indigo-50 text-xs text-indigo-500 rounded-full">
                                <a href="/exam-questions/aafm/ctep">#
                                    {{ $certification->cert_id }}
                                </a>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Hot Exams Section -->
            <div id="hotExamsSection" class="hidden">

                <div id="hotExamsSection">
                    @include('components.hot-exam', [
                        'weeklyExams' => $weeklyExams,
                        'monthlyExams' => $monthlyExams,
                    ])
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterExams() {
            let input = document.getElementById("table-search").value.toLowerCase();
            let exams = document.querySelectorAll("#examsSection .md\\:flex");

            exams.forEach(exam => {
                let text = exam.textContent.toLowerCase();
                if (text.includes(input)) {
                    exam.style.display = "";
                } else {
                    exam.style.display = "none";
                }
            });
        }

        function filterCertifications() {
            let input = document.getElementById("certifications-search").value.toLowerCase();
            let certifications = document.querySelectorAll("#certificationsSection .md\\:flex");

            certifications.forEach(certification => {
                let text = certification.textContent.toLowerCase();
                if (text.includes(input)) {
                    certification.style.display = "";
                } else {
                    certification.style.display = "none";
                }
            });
        }

        function showTab(tabName) {
            const sections = ['exams', 'certifications', 'hotExams'];
            sections.forEach(section => {
                document.getElementById(section + 'Section').classList.add('hidden');
                document.getElementById(section + 'Tab').classList.remove('text-blue-600', 'bg-gray-200');
                document.getElementById(section + 'Tab').classList.add('hover:text-gray-600', 'hover:bg-gray-50');
            });

            document.getElementById(tabName + 'Section').classList.remove('hidden');
            document.getElementById(tabName + 'Tab').classList.add('text-blue-600', 'bg-gray-200');
            document.getElementById(tabName + 'Tab').classList.remove('hover:text-gray-600', 'hover:bg-gray-50');
        }
    </script>
@endsection
