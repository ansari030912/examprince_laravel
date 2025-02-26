<section class="pt-10 pb-6 bg-green-50">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap lg:flex-nowrap bg-white shadow rounded">
            <!-- Word to Word Weekly -->
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 text-center border-2 border-gray-200 border-spacing-1">
                <p class="text-md lg:text-base font-semibold text-gray-600">
                    <span>Real Exam Comes</span>
                    <span class="text-xs py-1 px-2 ml-1 font-semibold text-green-600 bg-green-100 rounded-full">
                        Weekly
                    </span>
                </p>
                <p class="my-1 text-3xl lg:text-4xl font-bold font-heading count-up"
                    data-count="{{ $examStats['exam_last_week_word_to_word'] }}">
                    {{ number_format($examStats['exam_last_week_word_to_word']) }}
                </p>
                <span class="text-sm lg:text-base font-semibold text-gray-500">Word to Word</span>
            </div>

            <!-- Average Score Monthly -->
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 text-center border-2 border-gray-200">
                <p class="text-md lg:text-base font-semibold text-gray-600">
                    <span>Customers Passed Exam</span>
                    <span class="text-xs py-1 px-2 ml-1 font-semibold text-blue-600 bg-blue-100 rounded-full">
                        Monthly
                    </span>
                </p>
                <p class="my-1 text-3xl lg:text-4xl font-bold font-heading count-up"
                    data-count="{{ $examStats['exam_last_week_average_score'] }}">
                    {{ number_format($examStats['exam_last_week_average_score']) }}
                </p>
                <span class="text-sm lg:text-base font-semibold text-gray-500">Average Score</span>
            </div>

            <!-- Exam Popularity -->
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 text-center border-2 border-gray-200">
                <p class="text-md lg:text-base font-semibold text-gray-600">
                    <span>Exam Popularity</span>
                    <span class="text-xs py-1 px-2 ml-1 font-semibold text-purple-600 bg-purple-100 rounded-full">
                        Last 6 Months
                    </span>
                </p>
                <p class="my-1 text-3xl lg:text-4xl font-bold font-heading count-up"
                    data-count="{{ $examStats['exam_popularity'] }}">
                    {{ number_format($examStats['exam_popularity']) }}
                </p>
                <span class="text-sm lg:text-base font-semibold text-gray-500">Users Search for this Exam</span>
            </div>

            <!-- Product Sales -->
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 py-6 border-2 border-gray-200 text-center">
                <p class="text-md lg:text-base font-semibold text-gray-600">
                    <span>Product Sales</span>
                    <span class="text-xs py-1 px-2 ml-1 font-semibold text-yellow-600 bg-yellow-100 rounded-full">
                        Yearly
                    </span>
                </p>
                <p class="my-1 text-3xl lg:text-4xl font-bold font-heading count-up"
                    data-count="{{ $examStats['exam_sales'] }}">
                    {{ number_format($examStats['exam_sales']) }}
                </p>
                <span class="text-sm lg:text-base font-semibold text-gray-500">Total Users Buy Exams</span>
            </div>
        </div>
    </div>
</section>

<!-- Include CountUp.js -->
<!-- Include CountUp.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.umd.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countUpElements = document.querySelectorAll(".count-up");

        if (typeof countUp === "undefined") {
            console.error("CountUp.js not loaded.");
            return;
        }

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const countElement = entry.target;
                    const countTo = parseFloat(countElement.dataset.count.replace(/,/g, "")) || 0;

                    if (!isNaN(countTo)) {
                        const countUp = new countUp.CountUp(countElement, countTo, {
                            duration: 2.5, // Optimized duration for better UX
                            separator: ",",
                            startVal: 0, // Start from 0
                        });

                        if (!countUp.error) {
                            countUp.start();
                        } else {
                            console.error("CountUp error:", countUp.error);
                        }
                    }

                    observer.unobserve(countElement);
                }
            });
        }, { threshold: 0.5 });

        countUpElements.forEach(el => observer.observe(el));
    });
</script>
