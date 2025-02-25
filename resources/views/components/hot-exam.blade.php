<section style="background-image:url('/bg-cut-4.png')" class="py-8 lg:py-14 bg-cover">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center mb-8 md:mb-10">
            <h2 class="font-bold sm:text-4xl text-gray-700 mb-6">Hot Exams</h2>
            <p class="text-lg text-gray-700 opacity-80">
                Our pricing plans are simple and designed to cater to households and companies of various sizes.
            </p>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center mb-12">
            <div class="flex items-center">
                <button id="weekly-btn" role="button" aria-pressed="false"
                    class="cursor-pointer px-4 py-2 text-lg leading-6 text-teal-800 font-medium bg-lime-50 rounded-full transition duration-200">

                    Weekly
                </button>
                <div id="toggle-container"
                    class="relative flex w-10 h-5 mx-3 px-0.5 items-center rounded-full bg-gray-300 shadow-inner transition duration-200">
                    <button id="toggle-btn" class="w-5 h-5 bg-green-500 rounded-full transition duration-200"></button>
                </div>
                <button id="monthly-btn" role="button" aria-pressed="true"
                    class="cursor-pointer px-4 py-2 text-lg leading-6 text-white font-medium bg-green-500 rounded-full transition duration-200">

                    Monthly
                </button>
            </div>
        </div>

        <div id="exam-container" class="flex flex-wrap justify-center lg:justify-start">
            @foreach ($weeklyExams->take(10) as $exam)
                <div class="exam-card week w-full sm:w-1/2 md:w-1/4 lg:w-1/5 p-2 hidden">
                    <div class="bg-white p-4 shadow-lg rounded-xl min-h-[310px] flex flex-col">
                        <div class="flex-grow">
                            <p class="text-base flex justify-between text-gray-800 font-bold mb-2">
                                <span>{{ $exam->vendor_title }}</span>
                                <span class="text-green-500 font-semibold">{{ $exam->exam_code }}</span>
                            </p>
                            <hr class="mt-2 border-gray-300" />
                            <span class="block text-sm text-gray-600 font-bold mt-3 mb-6">
                                {{ $exam->exam_code }} - {{ $exam->exam_title }}
                            </span>
                            <div class="flex justify-center mb-1">
                                <img src="/img-1.png" width="150px" alt="Exam Image" />
                            </div>
                        </div>
                        <hr class="border-t mb-3 border-gray-300 mt-2" />
                        <a href="/exam-questions/{{ $exam->vendor_perma }}/{{ $exam->exam_perma }}"
                            class="inline-flex group w-full py-2 px-2 items-center justify-center text-base font-medium text-green-500 hover:text-white border border-green-500 hover:bg-green-500 rounded-full transition duration-200 mt-auto">
                            <span class="mr-2">Buy Now</span>
                        </a>
                    </div>
                </div>
            @endforeach

            @foreach ($monthlyExams->take(10) as $exam)
                <div class="exam-card month w-full sm:w-1/2 md:w-1/4 lg:w-1/5 p-2">
                    <div class="bg-white p-4 shadow-lg rounded-xl min-h-[310px] flex flex-col">
                        <div class="flex-grow">
                            <p class="text-base flex justify-between text-gray-800 font-bold mb-2">
                                <span>{{ $exam->vendor_title }}</span>
                                <span class="text-green-500 font-semibold">{{ $exam->exam_code }}</span>
                            </p>
                            <hr class="mt-2 border-gray-300" />
                            <span class="block text-sm text-gray-600 font-bold mt-3 mb-6">
                                {{ $exam->exam_code }} - {{ $exam->exam_title }}
                            </span>
                            <div class="flex justify-center mb-1">
                                <img src="/img-1.png" width="150px" alt="Exam Image" />
                            </div>
                        </div>
                        <hr class="border-t mb-3 border-gray-300 mt-2" />
                        <a href="/exam-questions/{{ $exam->vendor_perma }}/{{ $exam->exam_perma }}"
                            class="inline-flex group w-full py-2 px-2 items-center justify-center text-base font-medium text-green-500 hover:text-white border border-green-500 hover:bg-green-500 rounded-full transition duration-200 mt-auto">
                            <span class="mr-2">Buy Now</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const weeklyBtn = document.getElementById('weekly-btn');
        const monthlyBtn = document.getElementById('monthly-btn');
        const toggleBtn = document.getElementById('toggle-btn');
        const weeklyExams = document.querySelectorAll('.exam-card.week');
        const monthlyExams = document.querySelectorAll('.exam-card.month');

        let showWeekly = false;

        function toggleExams() {
            if (showWeekly) {
                weeklyExams.forEach(exam => exam.classList.remove('hidden'));
                monthlyExams.forEach(exam => exam.classList.add('hidden'));
                weeklyBtn.classList.add('bg-green-500', 'text-white');
                weeklyBtn.classList.remove('bg-lime-50', 'text-teal-800');
                monthlyBtn.classList.add('bg-lime-50', 'text-teal-800');
                monthlyBtn.classList.remove('bg-green-500', 'text-white');
                toggleBtn.style.transform = 'translateX(0)';
                weeklyBtn.setAttribute('aria-pressed', 'true');
                monthlyBtn.setAttribute('aria-pressed', 'false');
            } else {
                weeklyExams.forEach(exam => exam.classList.add('hidden'));
                monthlyExams.forEach(exam => exam.classList.remove('hidden'));
                monthlyBtn.classList.add('bg-green-500', 'text-white');
                monthlyBtn.classList.remove('bg-lime-50', 'text-teal-800');
                weeklyBtn.classList.add('bg-lime-50', 'text-teal-800');
                weeklyBtn.classList.remove('bg-green-500', 'text-white');
                toggleBtn.style.transform = 'translateX(20px)';
                weeklyBtn.setAttribute('aria-pressed', 'false');
                monthlyBtn.setAttribute('aria-pressed', 'true');
            }
        }

        weeklyBtn.addEventListener('click', () => {
            showWeekly = true;
            toggleExams();
        });

        monthlyBtn.addEventListener('click', () => {
            showWeekly = false;
            toggleExams();
        });

        toggleBtn.addEventListener('click', () => {
            showWeekly = !showWeekly;
            toggleExams();
        });

        toggleExams();
    });
</script>
