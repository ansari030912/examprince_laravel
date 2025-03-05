@if ($examDetails['teImages']->count())
    <div class="container mx-auto">
        <!-- Slider Container -->
        <div class="relative overflow-hidden">
            <div id="teSlider" class="flex px-3 transition-transform duration-500 ease-in-out"
                style="transform: translateX(0%);">
                @foreach ($examDetails['teImages'] as $index => $teImage)
                    <div class="flex-shrink-0 p-2 w-full md:w-1/3 lg:w-1/5 cursor-pointer te-image"
                        data-index="{{ $index }}" data-src="{{ $teImage->te_img_src }}">
                        <img src="{{ 'https://img.examprince.com/' . strtolower(substr($teImage->te_img_src, 0, 1)) . '/' . $teImage->te_img_src }}"
                            alt="img-{{ $teImage->te_img_id }}" class="w-full" />
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation Arrows -->
            <div class="absolute inset-0 flex justify-between items-center px-4 pointer-events-none">
                <button id="tePrev" class="pointer-events-auto bg-white bg-opacity-50 rounded-full p-2"
                    type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke="gray" stroke-width="2" fill="none" />
                    </svg>
                </button>
                <button id="teNext" class="pointer-events-auto bg-white bg-opacity-50 rounded-full p-2"
                    type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke="gray" stroke-width="2" fill="none" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Full-View Image with Blurred Backdrop -->
    <div id="teModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
        <!-- Backdrop with dark translucent and blur -->
        <div class="absolute inset-0 bg-transparent backdrop-blur-sm"></div>
        <!-- Modal Content Container -->
        <div class="relative z-10 bg-none rounded-lg w-full max-w-2xl max-h-screen overflow-auto flex flex-col items-center">
            <!-- Modal Header -->
            <div class="flex justify-end w-full">
                <button id="teModalClose" class="text-white bg-red-600 rounded-full p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M16 2C8.2 2 2 8.2 2 16s6.2 14 14 14 14-6.2 14-14S23.8 2 16 2m0 26C9.4 28 4 22.6 4 16S9.4 4 16 4s12 5.4 12 12-5.4 12-12 12" />
                        <path fill="currentColor"
                            d="M21.4 23L16 17.6 10.6 23 9 21.4l5.4-5.4L9 10.6l1.6-1.6 5.4 5.4L21.4 9l1.6 1.6-5.4 5.4 5.4 5.4z" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="mt-4 w-full">
                <div class="relative">
                    <img id="teModalImage" src="" alt="Full Test Engine Image"
                        class="max-w-full max-h-[80vh] object-contain mx-auto" />
                    <!-- For large screens: Next/Prev buttons over the image -->
                    <button id="teModalPrevLg"
                        class="hidden lg:block absolute left-0 top-1/2 transform -translate-y-1/2 p-2 text-white"
                        type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke="gray" stroke-width="2" fill="none" />
                        </svg>
                    </button>
                    <button id="teModalNextLg"
                        class="hidden lg:block absolute right-0 top-1/2 transform -translate-y-1/2 p-2 text-white"
                        type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke="gray" stroke-width="2" fill="none" />
                        </svg>
                    </button>
                </div>
                <!-- For small/medium screens: Next/Prev buttons below the image -->
                <div class="flex justify-between w-full lg:hidden mt-4 px-2">
                    <button id="teModalPrevSm" class="p-2 text-white rounded-md bg-green-500" type="button">
                        Previous
                    </button>
                    <button id="teModalNextSm" class="p-2 text-white rounded-md bg-green-500" type="button">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Slider functionality
            const slider = document.getElementById('teSlider');
            const prevBtn = document.getElementById('tePrev');
            const nextBtn = document.getElementById('teNext');
            const teImages = document.querySelectorAll('.te-image');
            let activeIndex = 0;

            // Responsive: lg=5, md=3, xs=1 images per view.
            function imagesPerView() {
                if (window.innerWidth >= 1024) return 5;
                else if (window.innerWidth >= 768) return 3;
                else return 1;
            }

            function updateSlider() {
                const shiftPercent = activeIndex * (100 / imagesPerView());
                slider.style.transform = `translateX(-${shiftPercent}%)`;
            }

            prevBtn.addEventListener('click', function() {
                if (activeIndex > 0) {
                    activeIndex--;
                    updateSlider();
                }
            });

            nextBtn.addEventListener('click', function() {
                if (activeIndex < teImages.length - imagesPerView()) {
                    activeIndex++;
                    updateSlider();
                }
            });

            // Modal functionality
            const modal = document.getElementById('teModal');
            const modalImage = document.getElementById('teModalImage');
            const modalClose = document.getElementById('teModalClose');
            const modalPrevLg = document.getElementById('teModalPrevLg');
            const modalNextLg = document.getElementById('teModalNextLg');
            const modalPrevSm = document.getElementById('teModalPrevSm');
            const modalNextSm = document.getElementById('teModalNextSm');
            let selectedImageIndex = null;

            // Format image URL by prepending base URL with first letter.
            function formatImageUrl(src) {
                if (!src) return '';
                const firstLetter = src.charAt(0).toLowerCase();
                return `https://img.examprince.com/${firstLetter}/${src}`;
            }

            // Open modal when a slider image is clicked.
            teImages.forEach(function(el) {
                el.addEventListener('click', function() {
                    selectedImageIndex = parseInt(el.getAttribute('data-index'));
                    openModal(selectedImageIndex);
                });
            });

            function openModal(index) {
                const src = teImages[index].getAttribute('data-src');
                modalImage.src = formatImageUrl(src);
                modal.classList.remove('hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
            }

            modalClose.addEventListener('click', closeModal);

            function modalPrevHandler(e) {
                e.stopPropagation();
                selectedImageIndex = (selectedImageIndex > 0) ? selectedImageIndex - 1 : teImages.length - 1;
                openModal(selectedImageIndex);
            }

            function modalNextHandler(e) {
                e.stopPropagation();
                selectedImageIndex = (selectedImageIndex < teImages.length - 1) ? selectedImageIndex + 1 : 0;
                openModal(selectedImageIndex);
            }

            // Bind both large and small screen nav buttons.
            modalPrevLg.addEventListener('click', modalPrevHandler);
            modalNextLg.addEventListener('click', modalNextHandler);
            modalPrevSm.addEventListener('click', modalPrevHandler);
            modalNextSm.addEventListener('click', modalNextHandler);

            // Close modal if clicking on the backdrop.
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
    </script>
@endif
