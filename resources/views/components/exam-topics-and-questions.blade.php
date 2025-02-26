@include('components.stat-countup')
<section class="pb-10 bg-green-50">
    <h3 class="text-center font-black text-2xl text-gray-700 mb-6">What is in Premium Bundle?</h3>
    <div class="container px-2 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 rounded">
            <!-- Loop Through Exam Question Types -->
            @foreach ($examDetails['exam_question_types'] as $question)
                <div class="p-4 bg-white shadow border border-gray-200 flex flex-col justify-center">
                    <p class="text-md flex justify-between lg:text-base font-semibold text-gray-600">
                        <span class="inline-flex font-bold flex-col justify-center">
                            <span>{{ $question->question_type }}</span>
                        </span>
                        <span class="flex-col pl-2 inline-flex justify-center">
                            <span
                                class="text-base py-1 px-2 ml-1 font-semibold text-green-600 bg-green-100 rounded-full">
                                {{ $question->question_type_count }}
                            </span>
                        </span>
                    </p>
                </div>
            @endforeach

            <!-- Loop Through Exam Topics -->
            @foreach ($examDetails['exam_topics'] as $topic)
                <div class="p-4 bg-white shadow border border-gray-200 flex flex-col justify-center">
                    <p class="text-md flex justify-between lg:text-base font-semibold text-gray-600">
                        <span class="inline-flex font-bold flex-col justify-center">
                            <span>{{ $topic->topic }}</span>
                        </span>
                        <span class="flex-col pl-2 inline-flex justify-center">
                            <span
                                class="text-base py-1 px-2 ml-1 font-semibold text-green-600 bg-green-100 rounded-full">
                                {{ $topic->topic_questions }}
                            </span>
                        </span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
