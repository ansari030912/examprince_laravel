<section class="py-12 bg-white overflow-hidden bg-cover">
    <div class="container px-4 mx-auto">
        <div class="md:max-w-4xl mb-8 md:mb-10">
            <h2 class="mb-4 text-3xl md:text-4xl leading-tight font-bold tracking-tighter">
                Latest Recently Updated Exam Questions
            </h2>
            <p class="text-lg md:text-xl text-coolGray-500 font-medium">
                With our integrated CRM, project management, collaboration, and invoicing capabilities,
                you can manage every aspect of your business in one secure platform.
            </p>
        </div>
        <div class="flex flex-wrap lg:items-center -mx-4">
            <div class="w-full lg:w-5/12 xl:w-5/12 px-4 mb-8 lg:mb-0">
                <div class="relative mx-auto lg:ml-0 max-w-max">
                    <img class="absolute z-10 -left-8 -top-8 w-28 lg:w-auto text-yellow-400" src="{{ asset('circle3-yellow.svg') }}" alt="">
                    <img class="absolute z-10 -right-7 -bottom-8 w-28 lg:w-auto text-blue-500" src="{{ asset('dots3-blue.svg') }}" alt="">
                    <img src="{{ asset('exam.png') }}" alt="">
                </div>
            </div>
            <div class="w-full lg:w-7/12 xl:w-7/12 px-4">
                <section>
                    <div class="container mx-auto">
                        <div class="overflow-x-auto custom-scrollbar">
                            <div class="inline-block w-full min-w-max overflow-hidden p-2">
                                <table class="table-auto w-full">
                                    <tbody>
                                        @foreach($recentlyUpdatedExams->take(10) as $index => $exam)
                                            <tr style="border-radius: 15px; box-shadow: {{ $index % 2 == 0 ? '0px 0px 10px rgba(0, 0, 0, 0.1)' : '' }}">
                                                <td class="p-0">
                                                    <div class="{{ $index % 2 == 0 ? 'flex items-center pl-4 pr-4 h-20 bg-blueGray-50 border-l border-t border-b border-gray-100 bg-gray-50 rounded-tl-2xl rounded-bl-2xl' : 'flex items-center pl-4 pr-4 h-20' }}">
                                                        <div class="flex items-center">
                                                            <img class="mr-4 h-8" src="{{ $exam->exam_vendor_img }}" alt="{{ $exam->exam_vendor_title }}">
                                                            <div class="flex-shrink-1">
                                                                <h4 class="font-heading text-wrap font-medium leading-4 text-blue-400 hover:text-blue-600">
                                                                    <a href="{{ url('/exam-questions/'.$exam->exam_vendor_perma.'/'.$exam->exam_perma) }}" class="text-lg text-gray-600">
                                                                        {{ $exam->exam_vendor_title }} - {{ $exam->exam_code }}
                                                                    </a>
                                                                    <br>
                                                                    <a href="{{ url('/exam-questions/'.$exam->exam_vendor_perma.'/'.$exam->exam_perma) }}" class="text-sm">
                                                                        {{ $exam->exam_title }}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-0 text-right">
                                                    <div class="{{ $index % 2 == 0 ? 'flex items-center justify-end p-5 h-20 text-right bg-blueGray-50 border-t border-b border-r rounded-tr-xl rounded-br-xl border-gray-100 bg-gray-50' : 'flex items-center justify-end p-5 h-20 text-right' }}">
                                                        <span class="py-2 pb-2 px-3 text-xs text-green-600 font-medium bg-green-200 rounded-full">
                                                            {{ \Carbon\Carbon::parse($exam->exam_update_date)->format('d M Y') }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
