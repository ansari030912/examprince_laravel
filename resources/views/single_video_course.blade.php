@extends('layouts.app')

@section('main-content')
    @if (!is_null($banner))
        <div class="banner-container text-center py-6">
            <a href="{{ $banner->banner_link }}" target="_blank">
                <img src="{{ $banner->banner_src }}" alt="Banner" class="mx-auto">
            </a>
        </div>
    @endif

    <section class="pt-12 pb-12 bg-white overflow-hidden">
        <div class="relative container px-4 mx-auto">
            <!-- Course Header -->
            <h1 class="mb-12 text-center text-3xl font-heading font-medium">
                {{ $course->title }}
            </h1>
            <div class="flex flex-wrap -mx-4">
                <!-- Left Column: Image and “What’s included” -->
                <div class="w-full lg:w-5/12 px-4 mb-16 lg:mb-0">
                    <div class="relative w-full md:w-full ml-auto">
                        <div class="w-4/6 mx-auto">
                            <img src="https://video.dumpsarena.com/img/{{ $course->image }}" alt="Video Formats" />
                        </div>
                        <div class="mt-7 md:mx-10">
                            <hr class="mb-2" />
                            <h4 class="mb-4 font-heading font-medium text-center text-3xl">
                                What’s included
                            </h4>
                            <!-- Duration Button -->
                            <button
                                class="inline-flex items-center justify-center text-sm h-12 w-full rounded-full border-2 border-gray-100 hover:border-gray-200 border-opacity-80 text-gray-400 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em" viewBox="0 0 72 72">
                                    <circle cx="35.905" cy="36.014" r="27.035" fill="#fcea2b" />
                                    <circle cx="36.006" cy="36.037" r="21.871" fill="white" />
                                    <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M55.11 25.38a21.863 21.863 0 1 1-8.095-8.245" />
                                    <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M62.94 35.997a27.046 27.046 0 1 1-5.266-16.038" />
                                    <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m47.394 21.578l11.038-1.16l-1.16-11.038m-7.297 26.974H35.891V18.52m0 35.391v-3.845M21.143 36.354h-3.057h0" />
                                    <circle cx="35.891" cy="36.354" r="3.737" />
                                    <circle cx="48.694" cy="47.937" r="1.48" />
                                    <circle cx="23.087" cy="24.717" r="1.48" />
                                    <circle cx="23.087" cy="47.937" r="1.48" />
                                </svg>
                                <span class="ml-2">{{ $course->duration }} : Duration</span>
                            </button>
                            <!-- Lectures Button -->
                            <button
                                class="inline-flex items-center justify-center text-sm h-12 w-full rounded-full border-2 border-gray-100 hover:border-gray-200 border-opacity-80 text-gray-400 font-medium mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em" viewBox="0 0 128 128">
                                    <path fill="#01579b"
                                        d="M118.03 102.32L72.29 123c-2.82 1.33-5.76 1.2-8.46-.36L6.09 93.32c-1.65-1.06-2.14-2.61-2.04-3.69c.1-1.08.35-2.25 3.25-3.09l4.28-1.58l57.92 31.57l41.16-16.82z" />
                                    <path fill="#f5f5f5"
                                        d="M71.74 119.69a7.951 7.951 0 0 1-7.26-.26L8.11 91.03c-.8-.44-1.04-1.45-.56-2.23c1.24-2.05 3.52-8.53-.24-13.91l63.66 30.65z" />
                                    <path fill="#94c6d6"
                                        d="m115.59 99.98l-43.85 19.71c-1.45.63-4.34 1.75-7.67-.49c2.63.19 4.48-.9 5.43-2.67c.93-1.72.65-4.54-.48-6.13c-.69-.96-2.54-2.49-3.35-3.35L113.1 88.5c4.2-1.73 8.14.86 8.77 4.01c.7 3.56-3.84 6.47-6.28 7.47" />
                                    <path fill="#01579b"
                                        d="m117.78 86.96l-45.27 20.2c-2.85 1.13-6.04.98-8.77-.4L5.9 77.38c-.56-.28-1.39-1.05-1.72-2.1c-.54-1.75.14-3.95 2.19-4.65l62.68 31.95l42.92-18.37z" />
                                    <path fill="#0091ea"
                                        d="m121.19 89.89l-4.93-1.79l-10.16.59l-33.58 14.99c-2.85 1.13-6.04.98-8.77-.4L5.9 73.91c-1.49-.76-1.17-2.97.47-3.28l41.69-18.65c1.19-.22 2.41-.09 3.52.38l59.49 28.36s9.45 6.47 10.12 9.17" />
                                    <path fill="#616161"
                                        d="M105.53 88.98s6.26-2.45 11.18-2.23c4.92.22 6.63 3.67 6.63 3.67c-.93-4.23-5.3-6.39-5.3-6.39l-65-32.73c-.45-.19-2.11-.58-4.66.47c-2.06.85-8.79 4-8.79 4z" />
                                    <path fill="#424242"
                                        d="M123.62 91.22c-.47-1.87-1.63-3.87-3.77-4.84c-2.82-1.27-6.84-.94-9.41.4l-4.91 2.18v3.46l6.21-2.76c6.04-2.69 8.72 1.34 8.95 2.29c.96 3.87-.9 6.11-6.39 8.63l-8.92 4.02v3.48l10.26-4.57c4.54-1.82 9.72-5.24 7.98-12.29" />
                                    <path fill="#01579b"
                                        d="M33.01 90.31L15.74 66.44l2.71-1.21l19.43 26.7zm22.15 11l-3.08-2.44l53.45-10.91v1.75l-7.49 2.84z" />
                                    <path fill="#9ccc65"
                                        d="M14.8 46.18L82.31 34.9l29.49 32.47c1.49 1.57.68 4.17-1.44 4.6l-69.7 14.3z" />
                                    <path fill="#689f38"
                                        d="M110.36 69.17L41.14 83.19l-.22 3.3l69.44-14.24c1.96-.41 2.78-2.65 1.71-4.23c-.38.56-.96 1-1.71 1.15m3.73 15.13c.73 1.16.07 2.69-1.27 2.96L49.1 100.18c-3.83.79-7.59-1.72-7.93-5.62c-.29-3.3 1.94-6.29 5.19-6.97l61.28-13.76z" />
                                    <path fill="#616161"
                                        d="M55.59 80.1L30.21 43.78l-14.48 3.83c-3.35 3.33-2.1 8.8-2.1 8.8S35.8 91.99 39.3 96.54c3.5 4.55 8.61 3.84 8.61 3.84l8.63-1.74l-.9-16.1z" />
                                    <path fill="#424242"
                                        d="M55.59 80.34L43.4 82.86c-3.33.75-3.93 3.88-3.93 3.88L10.04 44.57s-4.19 5.07-1.41 9.38L39.3 96.54c3.35 4.77 8.61 3.88 8.61 3.88l8.63-1.74l-.89-15.78z" />
                                    <path fill="#b9e4ea"
                                        d="M110.25 83c.31.68-.09 1.47-.82 1.62L48.5 97.12c-3.83.79-6.54-1.75-6.4-5.21c.18-4.37 2.63-6.22 5.87-6.89l61.23-12.51s-2.08 2.34-.49 6.72c.54 1.51 1.12 2.85 1.54 3.77" />
                                    <path fill="none" stroke="#424242" stroke-miterlimit="10" stroke-width="2.07"
                                        d="M45.21 83.7L19.1 46.76" />
                                    <path fill="#424242" d="M47.26 67.95L13.68 51.03l-1.36 2.68l38.8 19.77z" />
                                    <path fill="#689f38"
                                        d="m108.79 64.03l-2.46-2.7L68.5 78.69L47.26 68.18l3.62 5.18l14.07 7.19l10.48-1.61z" />
                                    <path fill="#c62828"
                                        d="M118.02 57.35L72.29 78.03c-2.82 1.33-5.76 1.2-8.46-.36L6.09 48.35c-1.65-1.06-2.14-2.61-2.04-3.69s.35-2.25 3.25-3.09l2.71-1l59.32 29.11l48.17-19.93z" />
                                    <path fill="#f5f5f5"
                                        d="M71.73 74.72a7.951 7.951 0 0 1-7.26-.26L8.1 46.06c-.8-.44-1.04-1.45-.56-2.23c1.24-2.05 3.52-8.53-.24-13.91l62.24 31.66z" />
                                    <path fill="#94c6d6"
                                        d="M115.58 55.01L71.73 74.72c-1.45.63-4.34 1.75-7.67-.49c2.63.19 4.48-.9 5.43-2.67c.93-1.72.65-4.54-.48-6.13c-.69-.96-2.54-2.49-3.35-3.35l47.43-18.55c4.2-1.73 8.14.86 8.77 4.01c.7 3.56-3.84 6.47-6.28 7.47" />
                                    <path fill="#c62828"
                                        d="m117.78 41.99l-45.27 20.2c-2.85 1.13-6.04.98-8.77-.4L5.89 32.41c-.6-.3-1.5-1.07-1.79-2.16c-.43-1.62.13-3.75 2.26-4.59l53.01-11.23z" />
                                    <path fill="#f44336"
                                        d="m121.18 44.92l-4.93-1.79l-10.16.59l-33.58 14.99c-2.85 1.13-6.04.98-8.77-.4L5.89 28.93c-1.49-.76-.96-2.77.47-3.28l41.7-18.64c1.19-.22 2.41-.09 3.52.38l59.49 28.36s9.44 6.46 10.11 9.17" />
                                    <path fill="#616161"
                                        d="M105.53 44s5.21-1.83 10.13-1.61c4.92.22 7.69 3.05 7.69 3.05c-1.01-4.52-5.3-6.39-5.3-6.39l-65-32.73c-.45-.19-2.11-.58-4.66.47c-2.06.85-8.79 4-8.79 4z" />
                                    <path fill="#424242" d="M111.48 41.86L44.97 8.31l2.2-.99l67.64 33.9z" />
                                    <path fill="#424242"
                                        d="M123.61 46.25c-.47-1.87-1.26-3.68-3.49-4.62c-2.85-1.2-5.45-1.45-9.69.18l-4.91 2.18v3.46l6.21-2.76c3.15-1.48 7.79-1.16 8.95 2.29c1.27 3.78-.9 6.11-6.39 8.63l-8.92 4.02v3.48l10.26-4.57c4.55-1.82 9.73-5.24 7.98-12.29" />
                                </svg>
                                <span class="ml-2">{{ $course->lectures }} : Lectures</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Pricing, Description, Add to Cart, and Ratings -->
                <div class="w-full lg:w-7/12 px-4 xl:pl-20">
                    <div class="max-w-xl mb-6">
                        <p class="flex items-start mb-8">
                            <span class="flex items-center text-6xl text-blue-500 font-heading font-medium">
                                <span class="text-4xl">${{ $course->price }}</span>
                            </span>
                            <span class="flex items-center text-6xl text-gray-400 font-heading font-medium">
                                <span class="text-4xl">/</span>
                            </span>
                            <span class="relative left-1 text-red-500 font-heading font-medium line-through">
                                ${{ $course->full_price }}
                            </span>
                        </p>
                        <p class="text-base text-gray-400">
                            Get ready for your exam by enrolling in our comprehensive training course.
                            This course includes a full set of instructional videos designed to equip you
                            with in-depth knowledge essential for passing the certification exam with flying colors.
                        </p>
                    </div>
                    <div class="flex mb-6 items-center">
                        <div class="inline-flex mr-4">
                            <!-- Rating Stars -->
                            @for ($i = 0; $i < 5; $i++)
                                <button class="mr-1">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z"
                                            fill="yellow"></path>
                                    </svg>
                                </button>
                            @endfor
                        </div>
                        <span class="text-2xl text-gray-400">4.59</span>
                    </div>
                    <div class="mb-4">
                        <h4 class="mb-3 text-lg font-heading font-medium">
                            <span>Pay once, own it forever</span>
                        </h4>
                        <hr />
                    </div>
                    <div class="w-full -mx-2 mb-2">
                        <button id="addToCartBtn"
                            class="bg-green-600 cursor-pointer rounded-full hover:bg-green-700 text-white font-semibold h-10 w-full px-7 py-4 flex items-center justify-center gap-2 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                fill="none">
                                <!-- SVG path data -->
                            </svg>
                            <span style="font-size:16px">Add To Cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Accordion for Video Courses -->
            <div class="pt-1 mt-12 border-t border-gray-100">
                <span
                    class="inline-block p-3 w-full md:w-auto mb-4 md:mb-0 md:mr-20 lg:mr-36 text-blue-500 text-xl font-heading font-medium">
                    Video Courses
                </span>
                <div id="accordion">
                    @foreach ($course->sections as $index => $section)
                        <div class="accordion-item border-b border-gray-200">
                            <div class="accordion-header flex items-center justify-between p-4 cursor-pointer"
                                data-index="{{ $index }}">
                                <div class="flex items-center gap-2">
                                    <!-- Fixed container for the SVG -->
                                    <div class="w-5 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" fill="gray"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.669.864 8 0 6.331.864 1.5 3.364v8.31L8 16l6.5-4.326V3.364L9.669.864zM8 1.15l4.5 2.13L8 5.412 3.5 3.28 8 1.15zM2 4.613l5.5 2.36v7.27L2 12.883V4.613zm6.5 9.63v-7.27l5.5-2.36v4.17l-5.5 2.883zm6.5-.946-5.5 2.36v-7.27l5.5-2.36v7.27z" />
                                        </svg>
                                    </div>
                                    <!-- Section Title -->
                                    <h4 class="font-medium text-sm md:text-lg text-gray-700">{{ $section->section_title }}
                                    </h4>
                                </div>

                                <div class="accordion-icon">
                                    <!-- Expand Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="gray"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="accordion-body p-4 border-t border-gray-200 hidden">
                                <!-- Table layout for medium (md) and larger screens -->
                                <div class="hidden md:block">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-500 tracking-wider">
                                                    Lectures</th>
                                                <th
                                                    class="px-6 py-3 border-b-2 border-gray-300 text-sm leading-4 text-gray-500 text-right tracking-wider">
                                                    Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($section->lectures as $lecture)
                                                <tr>
                                                    <td
                                                        class="px-6 py-2 whitespace-no-wrap border-b border-gray-500 text-blue-600 text-lg leading-5">
                                                        {{ $lecture->lecture_seq }}. {{ $lecture->lecture_title }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-2 whitespace-no-wrap border-b border-gray-500 text-md text-right leading-5">
                                                        <span
                                                            class="relative inline-block px-3 font-semibold text-green-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                            <span
                                                                class="relative text-base">{{ $lecture->lecture_duration }}</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Mobile layout for small screens -->
                                <div class="block md:hidden">
                                    @foreach ($section->lectures as $lecture)
                                        <div class="border-b border-gray-300 py-2">
                                            <div class="text-blue-600 text-sm md:text-lg leading-5">
                                                {{ $lecture->lecture_seq }}. {{ $lecture->lecture_title }}
                                            </div>
                                            <div class="text-md text-right leading-5 mt-1">
                                                <span
                                                    class="relative inline-block px-3 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span
                                                        class="relative text-xs md:text-base">{{ $lecture->lecture_duration }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pass the training course details along with related exam and vendor details.
            // Ensure that your controller (show method) passes $course, and that $course->exam and $course->vendor are available.
            const courseDetails = @json($course);
            const vendorDetails = @json($vendor);
            const examDetails = @json($exam);


            // Build a cart item. Fields are constructed as:
            // - id: training course ID (e.g., course_id)
            // - title: use exam_title if available, else fallback to course title
            // - full_price: the original full price of the course
            // - price: the discounted price (if a coupon has been applied)
            // - off: discount percentage (if applicable)
            // - cart: a string field from the course (could be a unique identifier for the cart item)
            // - vendor_perma & vendor_title: retrieved from the vendor table
            // - exam_code & exam_title: retrieved from the related exam.
            const cartItem = {
                id: courseDetails.course_id,
                title: courseDetails.exam ? courseDetails.exam.exam_title : courseDetails.title,
                full_price: courseDetails.full_price,
                price: courseDetails.price,
                off: courseDetails.off || 0,
                cart: courseDetails.cart,
                vendor_perma: vendorDetails ? vendorDetails.vendor_perma : '',
                vendor_title: vendorDetails ? vendorDetails.vendor_title : '',
                exam_code: examDetails ? examDetails.exam_code : '',
                exam_title: examDetails ? examDetails.exam_title : ''
            };


            function showSnackbar(message, isError = false) {
                let snackbar = document.createElement('div');
                snackbar.textContent = message;
                snackbar.classList.add(
                    'fixed', 'bottom-5', 'right-5', 'px-6', 'py-3', 'rounded-lg', 'shadow-lg',
                    'text-white', 'text-lg', 'font-semibold', 'transition-all', 'duration-300', 'ease-in-out',
                    'z-50'
                );
                snackbar.classList.add(isError ? 'bg-red-600' : 'bg-green-600');
                document.body.appendChild(snackbar);
                setTimeout(() => {
                    snackbar.classList.add('opacity-0');
                    setTimeout(() => {
                        snackbar.remove();
                    }, 300);
                }, 3000);
            }

            document.getElementById('addToCartBtn').addEventListener('click', function() {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                // Check if the product is already in the cart.
                const exists = cart.some(item => item.id === cartItem.id);
                if (exists) {
                    showSnackbar(`❌ "${cartItem.title}" is already in your cart!`, true);
                    return;
                }
                cart.push(cartItem);
                localStorage.setItem('cart', JSON.stringify(cart));
                showSnackbar(`✅ "${cartItem.title}" added to cart!`);
            });
        });
    </script>

    <script>
        // Simple accordion functionality using JavaScript
        document.querySelectorAll('.accordion-header').forEach(function(header) {
            header.addEventListener('click', function() {
                var body = header.nextElementSibling;
                body.classList.toggle('hidden');
            });
        });
    </script>
@endsection
