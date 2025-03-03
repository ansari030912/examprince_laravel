@if (!is_null($banner))
    <div class="banner-container text-center py-6">
        <a href="{{ $banner->banner_link }}" target="_blank">
            <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
        </a>
    </div>
@endif
<div class="md:block hidden">
    @include('components.exam-page-top-details')
</div>
<section class="pt-6 pb-6 px-2 bg-white">
    <div class="container mx-auto">
        <div class="flex flex-wrap -m-4 mb-20">
            <!-- Product Image -->
            <div class="w-full lg:w-4/12 p-12">
                <div class="flex items-end gap-2">
                    <span style="display:flex;justify-content:center" class="group flex-1">
                        <div class="relative xl:hidden overflow-hidden rounded-xl flex flex-col justify-center transition duration-200"
                            style="height:270px;width:270px">
                            <img style="width:270px;height:270px"
                                class="absolute inset-0 rounded-xl transform group-hover:scale-105 transition duration-200"
                                src="/package-small-min_optimized.png" alt="ExamPrince Product" />
                        </div>
                        <div class="relative hidden xl:inline-flex overflow-hidden rounded-xl flex-col justify-center transition duration-200"
                            style="height:300px;width:420px">
                            <img style="width:420px;height:300px"
                                class="absolute inset-0 rounded-xl transform group-hover:scale-105 transition duration-200"
                                src="/package-small-min_optimized.png" alt="ExamPrince Product" />
                        </div>
                    </span>
                </div>
            </div>

            <!-- Product Details -->
            <div class="w-full lg:w-8/12 p-4">
                <div class="px-5 md:px-10">
                    <h2 class="font-heading font-bold text-gray-600 uppercase text-3xl mb-2 max-w-4xl">
                        {{ $examDetails['exam']->exam_code }} - {{ $examDetails['exam']->vendor_title }} -
                        {{ $examDetails['exam']->exam_title }}
                    </h2>
                    <p class="text-gray-500 text-base font-bold max-w-2xl mb-2">
                        Everything you need to prepare, learn & pass your certification exam easily. 90 days free
                        updates. First attempt 100% success.
                    </p>
                    <hr class="mb-4" style="border:2px solid #F5F6FA" />
                </div>
                <div class="px-5 md:px-10">
                    <p class="text-gray-500 text-base font-semibold max-w-xl">Last Update:
                        {{ $examDetails['exam']->exam_update_date }}</p>
                    <p class="text-gray-500 text-base font-semibold max-w-xl">Latest Question & Answers:
                        {{ $examDetails['exam']->exam_questions }}</p>
                    <p class="text-gray-500 text-base font-semibold max-w-xl">Exam Question Provider:
                        <a href="/exam-provider/{{ $examDetails['exam']->vendor_perma }}">
                            <span style="color:#0da8e5;cursor:pointer"
                                class="hover:underline">{{ $examDetails['exam']->vendor_title }}</span>
                        </a>
                    </p>
                    <p class="text-gray-500 text-base font-semibold mb-6 max-w-xl">
                        Certification Exam Name:
                        <span style="cursor:pointer">
                            @if(isset($examDetails['examCerts']) && is_array($examDetails['examCerts']) && !empty($examDetails['examCerts']))
                                @foreach ($examDetails['examCerts'] as $index => $certification)
                                    <a class="hover:underline text-sky-500"
                                       href="/vendor-exam-questions/{{ $examDetails['exam']->vendor_perma }}/{{ $certification['cert_perma'] }}">
                                        {{ $certification['cert_title'] }}@if ($index < count($examDetails['examCerts']) - 1), @endif
                                    </a>
                                @endforeach
                            @else
                                {{ $examDetails['exam']->title ?? 'N/A' }}
                            @endif
                        </span>
                    </p>

                    <!-- Star Rating -->
                    <div class="flex flex-wrap items-center gap-2">
                        <div class="flex gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M10.8586 4.71245C11.2178 3.60688 12.7819 3.60688 13.1412 4.71245L14.4246 8.66261C14.5853 9.15703 15.046 9.49179 15.5659 9.49179H19.7193C20.8818 9.49179 21.3651 10.9793 20.4247 11.6626L17.0645 14.1039C16.6439 14.4095 16.4679 14.9512 16.6286 15.4456L17.912 19.3957C18.2713 20.5013 17.0059 21.4207 16.0654 20.7374L12.7052 18.296C12.2846 17.9905 11.7151 17.9905 11.2945 18.296L7.93434 20.7374C6.99388 21.4207 5.72851 20.5013 6.08773 19.3957L7.37121 15.4456C7.53186 14.9512 7.35587 14.4095 6.93529 14.1039L3.57508 11.6626C2.63463 10.9793 3.11796 9.49179 4.28043 9.49179H8.43387C8.95374 9.49179 9.41448 9.15703 9.57513 8.66261L10.8586 4.71245Z"
                                        fill="#FFB11A"></path>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm font-bold text-gray-600">5.0
                            ({{ number_format($examDetails['exam']->reviews_count) }} reviews)</span>
                    </div>
                </div>
            </div>

            <!-- Product Options -->
        </div>
        @include('components.exam-add-to-cart')
    </div>
</section>
