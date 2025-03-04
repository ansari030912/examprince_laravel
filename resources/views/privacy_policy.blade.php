@extends('layouts.app')

@section('meta_title', 'Updated Exam Questions and Answers by Tech Professionals')
@section('meta_description',
    'Examprince is a premium provider of Real and Valid Exam Question and Answers of IT
    certification Exams. Pass your certification exam easily with PDF and test engine dumps in 2025.')
@section('meta_robots', 'index, follow')
@section('meta_canonical', url()->current())

@section('main-content')
    <section class="py-16 md:py-6 bg-white" style="background-image: url('/pattern-white.png');">
        @if (!is_null($banner))
            <div class="text-center py-6">
                <a href="{{ $banner->banner_link }}" target="_blank">
                    <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
                </a>
            </div>
        @endif
        <br />
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap lg:items-center mb-12 -mx-4">
                <div class="w-full md:w-5/12 px-4 mb-8 md:mb-0">
                    <div class="mx-auto md:ml-0 max-w-max overflow-hidden rounded-lg">
                        <img src="/table-work-computer-study-reading.jpg" alt="" />
                    </div>
                </div>
                <div class="w-full md:w-7/12 px-4">
                    <div
                        class="inline-block py-1 px-3 mb-6 text-xs leading-5 text-green-500 font-medium uppercase bg-green-100 rounded-full shadow-sm">
                        ExamPrince.com Privacy Policy
                    </div>
                    <h2 class="mb-4 text-2xl md:text-3xl leading-tight text-gray-800 font-bold tracking-tighter">
                        Welcome to the ExamPrince.com Privacy Center
                    </h2>

                    <p class="mb-8 md:mb-12 text-lg md:text-xl font-medium text-gray-500">
                        ExamPrince.com respects your privacy. Through this notice, we
                        commit to protecting your privacy and ensuring that your data is
                        handled responsibly.
                    </p>
                    <p class="mb-8 md:mb-12 text-lg md:text-xl font-medium text-gray-500">
                        In the following sections, we explain how your data is collected
                        and used.
                    </p>

                    <div class="flex items-center -mx-2">
                        <div class="w-auto px-2">
                            <h4 class="txl-base md:2ext-lg font-bold text-gray-700">
                                Tech Professionals
                            </h4>
                            <p class="text-base md:text-lg text-gray-500">
                                21 May 2025
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-5/12 lg:w-4/12 xl:w-3/12 px-4 mb-8">
                    <ul class="pb-6 mb-8 border-b border-gray-100">
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Scope of Privacy Notice
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                User Email and Password
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Information Collection
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Use of Information
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Sharing Information
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Cookies
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Credit Card Information
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                External Links
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="inline-block py-2 text-gray-600 hover:text-gray-700 font-bold">
                                Privacy Policy Revisions
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:flex-1 px-4">
                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Scope of Privacy Notice
                    </h3>
                    <p class="pb-6 text-lg text-gray-500 border-gray-100">
                        This privacy notice explains how ExamPrince.com handles personal
                        identification information shared by users and business entities
                        when visiting https://examprince.com and its associated servers.
                        By registering as a member of ExamPrince.com, you agree to the
                        terms of this privacy notice.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        User Email and Password
                    </h3>
                    <p class="mb-8 pb-10 text-lg text-gray-500 border-b border-gray-100">
                        When registering at ExamPrince.com, you are required to provide
                        an effective email address and create a password. Your email
                        address will serve as your username, and the password is the key
                        to accessing your account. It is important to choose a strong
                        password and keep it secure. If you forget your password, you
                        can recover it using the provided tools or by contacting our
                        support team. ExamPrince.com holds no responsibility for any
                        damage caused by a lost password due to individual mistakes or
                        improper use of the Member&apos;s Area.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Information Collection
                    </h3>
                    <p class="mb-6 text-lg text-gray-500">
                        ExamPrince.com collects personal identification information
                        during registration and when you use our products or services.
                        This includes your name, email address, and other details
                        necessary for providing our services. If you choose to use our
                        Products Delivery Service, additional information such as your
                        address, phone number, and postal code will be required.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Use of Information
                    </h3>
                    <p class="mb-6 text-lg text-gray-500">
                        The information collected is used to offer you personalized
                        services and to improve the quality of our products. After
                        becoming a member, you may receive information about promotions,
                        new products, services, and other updates. You may also request
                        assistance from our support team using the information provided.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Sharing Information
                    </h3>
                    <p class="mb-6 text-lg text-gray-500">
                        ExamPrince.com does not share, sell, rent, or disclose your
                        personal information to third parties, except under the
                        following circumstances:
                    </p>
                    <ul class="list-disc pl-5 text-lg text-gray-500">
                        <li>With your explicit permission.</li>
                        <li>
                            When necessary to provide the products or services you have
                            requested.
                        </li>
                        <li>When required by law or government authorities.</li>
                        <li>
                            When we determine that you have violated our service terms or
                            other agreements.
                        </li>
                    </ul>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Cookies
                    </h3>
                    <p class="mb-14 text-base md:text-lg text-gray-500">
                        ExamPrince.com uses cookies to enhance your browsing experience
                        by storing data related to your visits. Cookies help us
                        recognize you on subsequent visits and allow us to tailor our
                        services to your preferences. You can choose to accept or refuse
                        cookies by adjusting your browser settings. Refusing cookies may
                        limit your ability to use certain features of our website.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Credit Card Information
                    </h3>
                    <p class="mb-14 text-base md:text-lg text-gray-500">
                        For online payments, ExamPrince.com requires you to enter your
                        credit card information on secure payment processor websites. We
                        do not store any payment information on our servers. Our online
                        payments are handled through secure third-party gateways, and we
                        use SSL encryption to protect data transmission. If our payment
                        gateway detects potential fraud, you may receive an inquiry
                        email requesting additional information to verify your identity.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        External Links
                    </h3>
                    <p class="mb-14 text-base md:text-lg text-gray-500">
                        ExamPrince.com may contain links to external websites. We are
                        not responsible for the privacy practices or content of these
                        external sites. Any related company websites added to
                        ExamPrince.com will only receive general information, and your
                        personal identification information will not be disclosed.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Privacy Policy Revisions
                    </h3>
                    <p class="mb-14 text-base md:text-lg text-gray-500">
                        ExamPrince.com is committed to continuously improving our
                        privacy practices. As our services expand, we will update this
                        privacy policy as necessary. You can review the most current
                        version of the policy at any time. We will not notify users of
                        updates unless there is a significant change in how we handle
                        personal information.
                    </p>

                    <h3 class="mb-4 text-xl md:text-2xl font-bold text-gray-700">
                        Contact ExamPrince.com
                    </h3>
                    <p class="mb-8 text-lg md:text-xl font-medium text-gray-500">
                        If you have any questions about our privacy practices, please
                        contact us at sales@examprince.com.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
