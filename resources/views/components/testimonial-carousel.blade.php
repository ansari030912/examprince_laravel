<!-- Carousel CSS -->
<style>
    /* Hide the default scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 0;
        height: 0;
    }

    .custom-scrollbar::-webkit-scrollbar-track,
    .custom-scrollbar::-webkit-scrollbar-thumb,
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: transparent;
    }

    @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-up {
        animation: fadeUp 1s ease-in-out forwards;
    }

    .carousel-container {
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease;
    }

    .carousel-slide {
        flex-shrink: 0;
        padding: 1rem;
        box-sizing: border-box;
    }

    /* Responsive slide widths */
    @media (min-width: 1024px) {
        .carousel-slide {
            width: calc(100% / 3);
        }
    }

    @media (min-width: 768px) and (max-width: 1023px) {
        .carousel-slide {
            width: calc(100% / 2);
        }
    }

    @media (max-width: 767px) {
        .carousel-slide {
            width: 100%;
        }
    }

    .review-card {
        padding: 1.5rem;
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
            0 4px 6px -2px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Navigation arrows */
    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        border-radius: 50%;
        transition: background-color 0.3s ease;
    }

    .carousel-nav:hover {
        background-color: rgba(255, 255, 255, 1);
    }

    .carousel-nav.prev {
        left: 1rem;
    }

    .carousel-nav.next {
        right: 1rem;
    }
</style>

@php
    // Define 25 improved reviews
    $reviews = [
        [
            'text' =>
                'I passed my Amazon certification exam with excellent preparation from Exam Prince. Their practice tests boosted my confidence tremendously.',
            'name' => 'Jane Smith',
        ],
        [
            'text' =>
                'Exam Prince is my go-to resource for Microsoft certification prep. Their test engine made my study routine both effective and engaging.',
            'name' => 'Robert Johnson',
        ],
        [
            'text' =>
                'The Dell certification process was smooth and efficient, thanks to the comprehensive practice materials provided by Exam Prince.',
            'name' => 'Emily Davis',
        ],
        [
            'text' =>
                'PMI exams are notoriously challenging, but Exam Prince made my preparation manageable with clear explanations and practical tests.',
            'name' => 'Michael Wilson',
        ],
        [
            'text' =>
                'The Riverbed exam felt much more approachable with Exam Prince’s in-depth practice materials and supportive test engine.',
            'name' => 'Jessica Taylor',
        ],
        [
            'text' =>
                'RSA certification became achievable with Exam Prince’s outstanding practice exams that covered every scenario.',
            'name' => 'William Martinez',
        ],
        [
            'text' =>
                'For SAFe certification, Exam Prince is unparalleled. Their resources and test engine helped me master the concepts effortlessly.',
            'name' => 'Linda Anderson',
        ],
        [
            'text' =>
                'Exam Prince provided all the essential materials for Salesforce certification prep, making the process straightforward and effective.',
            'name' => 'Christopher Thomas',
        ],
        [
            'text' =>
                'SANS certification prep was simplified with Exam Prince’s detailed practice exams and intuitive platform.',
            'name' => 'Susan Jackson',
        ],
        [
            'text' =>
                'Exam Prince covered every aspect of SAP exam preparation, making the challenging content much more accessible.',
            'name' => 'Charles White',
        ],
        [
            'text' =>
                'Thanks to Exam Prince, I passed my SAS Institute exams with ease. Their practice tests are simply superb.',
            'name' => 'Patricia Harris',
        ],
        [
            'text' =>
                'The Scaled Agile exam was much more manageable after using Exam Prince’s comprehensive practice tests.',
            'name' => 'Daniel Lewis',
        ],
        [
            'text' =>
                'Exam Prince made my Scrum certification prep straightforward with their clear and engaging test engine.',
            'name' => 'Barbara Clark',
        ],
        [
            'text' =>
                'SDI exam preparation was a breeze with Exam Prince’s easy-to-follow practice tests and intuitive study materials.',
            'name' => 'Paul Robinson',
        ],
        [
            'text' =>
                'ServiceNow certification was made significantly easier with Exam Prince’s top-notch test engine and practical resources.',
            'name' => 'Nancy Walker',
        ],
        [
            'text' =>
                'The Sitecore exam was thoroughly covered by Exam Prince, which made the entire process much smoother.',
            'name' => 'Kevin Hall',
        ],
        [
            'text' =>
                'Exam Prince’s comprehensive practice exams helped me achieve Six Sigma certification with confidence.',
            'name' => 'Karen Young',
        ],
        [
            'text' =>
                'My Slack certification exam became much more manageable thanks to Exam Prince’s excellent test engine and study guides.',
            'name' => 'Donald Hernandez',
        ],
        [
            'text' =>
                'Exam Prince simplified SNIA certification prep with detailed practice tests that left no topic uncovered.',
            'name' => 'Betty King',
        ],
        [
            'text' =>
                'For Cisco certification, Exam Prince is the best resource. Their engaging test engine truly made all the difference.',
            'name' => 'Thomas Wright',
        ],
        [
            'text' =>
                'Amazon certification prep has never been easier—Exam Prince offers comprehensive resources that work!',
            'name' => 'Helen Lopez',
        ],
        [
            'text' =>
                'I passed my Microsoft certification with flying colors, thanks to the exceptional practice tests provided by Exam Prince.',
            'name' => 'Larry Scott',
        ],
        [
            'text' =>
                'Exam Prince is the ultimate resource for Dell certification prep. Their practice materials are both engaging and effective.',
            'name' => 'Margaret Green',
        ],
        [
            'text' =>
                'PMI certification became much simpler with Exam Prince’s thorough practice exams and supportive test engine.',
            'name' => 'Brian Adams',
        ],
        [
            'text' =>
                'Exam Prince’s user-friendly test engine made my Riverbed exam preparation a smooth and successful experience.',
            'name' => 'Dorothy Baker',
        ],
    ];
@endphp

<section style="padding-top: 3rem; padding-bottom: 3rem; background-color: #F8FAFC; overflow: hidden;">
    <div style="padding-left: 1rem; padding-right: 1rem; margin: 0 auto;">
        <h2 style="margin-bottom: 1.25rem; font-weight: bold; text-align: center; letter-spacing: -0.015em; line-height: 1.2;"
            class="text-4xl lg:text-5xl">
            See what others are saying
        </h2>
        <p
            style="margin-bottom: 4rem; font-size: 1.125rem; color: #4B5563; font-weight: 500; text-align: center; max-width: 24rem; margin: 0 auto;">
            Top Worldwide Reviews About ExamPrince.com
        </p>
        <div class="carousel-container custom-scrollbar">
            <!-- Navigation Buttons -->
            <button class="carousel-nav prev" id="prevBtn" aria-label="Previous">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="carousel-nav next" id="nextBtn" aria-label="Next">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div class="carousel-track" id="carouselTrack">
                @foreach ($reviews as $review)
                    <div class="carousel-slide">
                        <div class="review-card">
                            <div>
                                <p
                                    style="font-size: 1.125rem; font-weight: 500; text-align: center; padding-top: 10px;">
                                    <span style="display: flex; justify-content: center;">
                                        <span class="text-6xl"
                                            style="display: flex; justify-content: flex-start; flex-direction: column; margin-right: 5px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="0.3em" height="0.3em"
                                                viewBox="0 0 24 24" style="transform: scaleX(-1);">
                                                <path fill="currentColor"
                                                    d="M7 3h9.95v9.96l-3.99 7.98H8l3.97-7.98H7z" />
                                            </svg>
                                        </span>
                                        <span>{{ $review['text'] }}</span>
                                        <span class="text-6xl"
                                            style="display: flex; justify-content: flex-end; flex-direction: column; margin-left: 5px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="0.3em" height="0.3em"
                                                viewBox="0 0 24 24" style="transform: rotate(360deg);">
                                                <path fill="currentColor"
                                                    d="M7 3h9.95v9.96l-3.99 7.98H8l3.97-7.98H7z" />
                                            </svg>
                                        </span>
                                    </span>
                                </p>
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <div style="width: auto; padding: 0.5rem; text-align: center; padding-top: 20px;"
                                    class="text-green-500">
                                    <h3 style="font-size: 1.2rem; font-weight: 600;">
                                        {{ $review['name'] }}
                                        <hr class="border-2 border-green-300" />
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const track = document.getElementById('carouselTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let slides = track.children;
        let totalSlides = slides.length;
        let currentIndex = 0;
        let slidesPerView = 3; // default for large screens

        function updateSlidesPerView() {
            if (window.innerWidth < 768) {
                slidesPerView = 1;
            } else if (window.innerWidth < 1024) {
                slidesPerView = 2;
            } else {
                slidesPerView = 3;
            }
        }
        updateSlidesPerView();
        window.addEventListener('resize', updateSlidesPerView);

        function getSlideWidth() {
            return slides[0].offsetWidth;
        }

        function goToSlide(index) {
            const slideWidth = getSlideWidth();
            track.style.transition = 'transform 0.5s ease';
            track.style.transform = `translateX(-${index * slideWidth}px)`;
            currentIndex = index;
        }

        function nextGroup() {
            let newIndex = currentIndex + slidesPerView;
            if (newIndex >= totalSlides) {
                // Animate to the last group then reset without animation.
                goToSlide(totalSlides - slidesPerView);
                setTimeout(() => {
                    track.style.transition = 'none';
                    currentIndex = 0;
                    track.style.transform = `translateX(0px)`;
                }, 500);
            } else {
                goToSlide(newIndex);
            }
        }

        function prevGroup() {
            let newIndex = currentIndex - slidesPerView;
            if (newIndex < 0) {
                newIndex = 0;
            }
            goToSlide(newIndex);
        }

        // Auto-advance every 3 seconds
        let autoAdvance = setInterval(nextGroup, 3000);

        // Pause auto-advance on hover and resume on mouseleave
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.addEventListener('mouseenter', () => clearInterval(autoAdvance));
        carouselContainer.addEventListener('mouseleave', () => {
            autoAdvance = setInterval(nextGroup, 3000);
        });

        // Add click handlers to navigation buttons
        nextBtn.addEventListener('click', nextGroup);
        prevBtn.addEventListener('click', prevGroup);
    });
</script>
