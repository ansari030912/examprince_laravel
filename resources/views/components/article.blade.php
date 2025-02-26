<section class="py-16 md:py-24 bg-white" style="background-image: url('/pattern-white.png');">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap lg:items-center mb-12 -mx-4">
            <div class="w-full md:w-5/12 px-4 mb-8 md:mb-0">
                <div class="mx-auto md:ml-0 max-w-max overflow-hidden rounded-lg">
                    <img src="/table-work-computer-study-reading.jpg" alt="">
                </div>
            </div>
            <div class="w-full md:w-7/12 px-4">
                <div
                    class="inline-block py-1 px-3 mb-6 text-xs leading-5 text-green-500 font-medium uppercase bg-green-100 rounded-full shadow-sm">
                    {{ $examDetails['exam']->vendor_title }}
                </div>
                <div class="flex items-center">
                    <span class="mx-1 text-green-500">•</span>
                    <p class="inline-block text-green-500 font-medium">21 May 2025</p>
                </div>
                <h2 class="mb-4 text-2xl md:text-3xl leading-tight text-gray-800 font-bold tracking-tighter">
                    Master the {{ $examDetails['exam']->exam_title }} Exam: Enhance Your Skills with
                    {{ $examDetails['exam']->vendor_title }}
                    Certification!
                </h2>
                <p class="mb-8 md:mb-12 text-lg md:text-xl font-medium text-gray-500">
                    Exams Questions Provided By IT Professional.
                </p>
                <div class="flex items-center -mx-2">
                    <div class="w-auto px-2">
                        <img src="flex-ui-assets/images/blog/avatar.png" alt="">
                    </div>
                    <div class="w-auto px-2">
                        <h4 class="text-lg font-bold text-gray-700">Tech Professionals</h4>
                        <p class="text-base text-gray-500">21 May 2025</p>
                    </div>
                </div>
            </div>
        </div>

        @if (!$examDetails['exam']->exam_preorder && !$examDetails['exam']->exam_article)
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-5/12 lg:w-4/12 xl:w-3/12 px-4 mb-8">
                    <ul class="pb-6 mb-8 border-b border-gray-100">
                        <li class="mb-2">
                            <span
                                class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">Introduction</span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">Designed for
                                Busy Professionals</span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">Understanding
                                the {{ $examDetails['exam']->exam_title }} Exam Format</span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">Trustworthy and
                                Up-to-Date Content</span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">Pass Your
                                {{ $examDetails['exam']->exam_title }} Exam with Confidence</span>
                        </li>
                    </ul>
                </div>

                <div class="w-full md:flex-1 px-4">
                    <p class="pb-6 text-lg text-gray-500 border-gray-100">
                        Earning the prestigious {{ $examDetails['exam']->exam_title }} certification
                        from {{ $examDetails['exam']->vendor_title }}  significantly boosts your
                        marketability and opens doors to exciting opportunities.
                        Achieving this recognized credential expands your career
                        options and increases your earning potential. ExamPrince
                        practice tests provide the most efficient way to prepare for
                        and pass your {{ $examDetails['exam']->exam_title }} exam on the first try.
                    </p>
                    <p class="mb-8 pb-10 text-lg text-gray-500 border-b border-gray-100">
                        To earn the {{ $examDetails['exam']->exam_title }} certification, you'll need to pass the
                        relevant exam offered by {{ $examDetails['exam']->vendor_title }}.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">Designed for Busy Professionals</h3>
                    <!-- In your Blade file -->
                    <p class="mb-4 text-lg text-gray-500">
                        Understanding the time constraints of professionals, we provide comprehensive
                    <div class="mb-6 mt-6 p-6 block border-l-2 text-blue-400 border-green-500">
                        @foreach (json_decode($examDetails['exam']->exam_certs) as $cert)
                            <p
                                class="mb-4 text-lg md:text-xl leading-tight font-medium text-blue-500 hover:text-blue-600">
                                <a
                                    href="{{ url('vendor-exam-questions/' . $examDetails['exam']->exam_vendor_perma . '/' . $cert->cert_perma) }}">
                                    {{ $cert->cert_name }}
                                    <br />
                                </a>
                            </p>
                        @endforeach
                    </div>

                    that fit your schedule and align with the {{ $examDetails['exam']->exam_title }} exam
                    objectives.
                    </p>


                    <div class="mb-4 max-w-max overflow-hidden rounded-md">
                        <img src="flex-ui-assets/images/blog-content/content-photo2.jpg" alt="">
                    </div>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">Understanding the
                        {{ $examDetails['exam']->exam_title }} Exam Format</h3>
                    <p class="mb-14 text-lg text-gray-500">
                        Exam candidates are always interested in learning about the
                        structure and nature of exam questions. ExamPrince resources
                        address this by providing an overview of the format and types
                        of questions you can expect on the {{ $examDetails['exam']->exam_title }} exam.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">Trustworthy and Up-to-Date Content</h3>
                    <p class="mb-14 text-lg text-gray-500">
                        ExamPrince
                        @foreach (json_decode($examDetails['exam']->exam_certs) as $cert)
                            <span key={index}
                                class="mb-4 text-lg md:text-xl leading-tight font-medium text-blue-500 hover:text-blue-600">
                                <a
                                    href="{{ url('vendor-exam-questions/' . $examDetails['exam']->exam_vendor_perma . '/' . $cert->cert_perma) }}">
                                    {{ $cert->cert_name }},
                                </a>
                            </span>
                        @endforeach
                        include a concise set of questions that provide reliable,
                        current, and relevant information on each syllabus topic that
                        might be covered in your specific {examData.exam_title} exam.
                        The questions are verified and confirmed by qualified
                        professionals. You can be confident that you&apos;re receiving
                        high-quality information and not wasting time on irrelevant or
                        outdated material. Customer feedback consistently ranks
                        ExamPrince
                        @foreach (json_decode($examDetails['exam']->exam_certs) as $cert)
                            <span key={index} class="mb-4 text-lg md:text-lg leading-tight font-medium text-gray-500">
                                <span>
                                    {{ $cert->cert_name }},
                                </span>
                            </span>
                        @endforeach
                        as the best available, empowering them to master
                        {{ $examDetails['exam']->exam_title }} exam content and achieve success.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">Pass Your
                        {{ $examDetails['exam']->exam_title }} Exam with Confidence</h3>
                    <p class="mb-4 text-lg text-gray-500">
                        With ExamPrince exceptional IT exam preparation materials, you
                        can be sure of your success in your chosen
                        {{ $examDetails['exam']->exam_title }} exam. We offer a 100% money-back
                        guarantee. Exam Prince serves a vast network of customers with
                        state-of-the-art and exam-focused study materials that require
                        as little as two weeks to prepare for the complete
                        {{ $examDetails['exam']->exam_title }} exam syllabus.
                    </p>
                </div>
            </div>
        @else
            <div class="w-full px-4">
                <div class="mb-8 text-lg md:text-xl article font-medium text-gray-500">
                    {!! $decodedContent !!}
                </div>
            </div>
        @endif
    </div>
</section>
@include('components.article-css')
