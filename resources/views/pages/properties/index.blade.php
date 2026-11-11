<x-layouts.app activePage="properties" title="Featured Listings — Ethereal Estates">

    @push('styles')
    <style>
        /* Slider Viewport and Track */
        #cards-viewport {
            overflow: hidden;
            width: 100%;
            cursor: grab;
            user-select: none;
        }
        #cards-viewport:active {
            cursor: grabbing;
        }
        #cards-track {
            display: flex;
            gap: 24px;
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            will-change: transform;
        }
        /* Desktop: 3 cards fit with 4th card peeking on right (~3.22 cards in view) */
        .prop-slider-card {
            flex: 0 0 calc((100% - 48px) / 3.22);
            min-width: 0;
            background: #ffffff;
            border: 1px solid #ebebeb;
            border-radius: 20px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        }
        .prop-slider-card:hover {
            box-shadow: 0 12px 32px rgba(0,0,0,0.08);
            border-color: #c5983e80;
            transform: translateY(-2px);
        }
        @media (max-width: 1180px) {
            .prop-slider-card {
                flex: 0 0 calc((100% - 24px) / 2.2);
            }
        }
        @media (max-width: 680px) {
            .prop-slider-card {
                flex: 0 0 calc(100% - 40px);
            }
        }

        /* Modern Pagination Number Pills */
        .pg-num-pill {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
            color: #777777;
            background: #f5f5f5;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }
        .pg-num-pill.active {
            color: #ffffff;
            background: #c5983e;
            box-shadow: 0 2px 8px rgba(197, 152, 62, 0.3);
        }
        .pg-num-pill:hover:not(.active):not(.cursor-not-allowed) {
            color: #111111;
            background: #e8e8e8;
        }
    </style>
    @endpush

    <!-- ═══════════ SUBHEADER ROW (Redesigned without brackets) ═══════════ -->
    <div class="bg-white border-b border-gray-100 py-3.5 px-6 sm:px-10 lg:px-14">
        <div class="flex items-center justify-between">
            
            <!-- Left: Back link -->
            <div class="flex items-center gap-3 z-10">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-gray-500 hover:text-[#c5983e] transition-colors font-sans">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    Back
                </a>
            </div>

            <!-- Centre: Heading -->
            <h1 class="font-fragment text-xl sm:text-2xl md:text-3xl lg:text-[30px] uppercase tracking-[0.05em] text-[#111111] absolute left-1/2 -translate-x-1/2 text-center whitespace-nowrap leading-tight select-none font-normal">
                Featured Listings
            </h1>

            <!-- Right: Pagination Number Pills with Arrow buttons -->
            <div id="pg-pills" class="flex items-center gap-1.5 shrink-0 z-10">
                <button type="button"
                        id="pill-prev-btn"
                        class="pg-num-pill transition-all"
                        onclick="slidePrev()"
                        title="Previous Properties">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                <button type="button" class="pg-num-pill active" data-page="0" onclick="goToPage(0)">1</button>
                <button type="button" class="pg-num-pill" data-page="1" onclick="goToPage(1)">2</button>
                <button type="button" class="pg-num-pill" data-page="2" onclick="goToPage(2)">3</button>
                <button type="button"
                        id="pill-next-btn"
                        class="pg-num-pill transition-all"
                        onclick="slideNext()"
                        title="Next Properties">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- ═══════════ HORIZONTAL CARDS SLIDER ═══════════ -->
    <div class="relative w-full py-8 sm:py-10 px-6 sm:px-10 lg:px-14 overflow-hidden bg-white select-none group/slider">

        <!-- Floating Left Arrow -->
        <button type="button"
                id="slider-prev-btn"
                onclick="slidePrev()"
                aria-label="Previous properties"
                class="absolute left-2 sm:left-4 lg:left-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-white text-gray-900 border border-gray-200/90 shadow-[0_4px_20px_rgba(0,0,0,0.12)] flex items-center justify-center transition-all duration-200 hover:scale-105 hover:border-[#c5983e] hover:text-[#c5983e] cursor-pointer">
            <i class="fa-solid fa-chevron-left text-sm"></i>
        </button>

        <!-- Floating Right Arrow -->
        <button type="button"
                id="slider-next-btn"
                onclick="slideNext()"
                aria-label="Next properties"
                class="absolute right-2 sm:right-4 lg:right-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-white text-gray-900 border border-gray-200/90 shadow-[0_4px_20px_rgba(0,0,0,0.12)] flex items-center justify-center transition-all duration-200 hover:scale-105 hover:border-[#c5983e] hover:text-[#c5983e] cursor-pointer">
            <i class="fa-solid fa-chevron-right text-sm"></i>
        </button>

        <div id="cards-viewport">
            <div id="cards-track">

                @foreach($properties as $index => $prop)
                    @php
                        $subtitle = $prop->short_description ?? 'Bungalows and Single Detached Homes with 2 & 3-Car Garages';
                    @endphp

                    <div class="prop-slider-card group" data-index="{{ $index }}">

                        <!-- Top Property Image Thumbnail with Heart Button -->
                        <div class="relative w-full h-[250px] sm:h-[270px] bg-gray-100 overflow-hidden shrink-0">
                            <img src="{{ $prop->primary_image_url }}"
                                 alt="{{ $prop->title }}"
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out"
                                 loading="lazy" />

                            <!-- Top Left: Category Badge -->
                            <div class="absolute top-3 left-3 z-10 pointer-events-none">
                                <span class="px-2.5 py-1 rounded bg-black/60 backdrop-blur-md text-[9px] uppercase tracking-[0.16em] text-white font-medium">
                                    {{ $prop->category->name ?? 'Single Detached' }}
                                </span>
                            </div>

                            <!-- Top Right: Wishlist Button -->
                            <div class="absolute top-3 right-3 z-10">
                                <button type="button"
                                        @click="toggleSaveProperty({ id: {{ $prop->id }}, title: '{{ addslashes($prop->title) }}', city: '{{ addslashes($prop->city) }}', price: '{{ addslashes($prop->formatted_price) }}', image: '{{ $prop->primary_image_url }}', url: '{{ route('properties.show', $prop->slug) }}' })"
                                        class="w-8 h-8 rounded-full bg-black/50 hover:bg-black/80 backdrop-blur-md flex items-center justify-center text-white transition-colors cursor-pointer text-sm shadow-md"
                                        title="Save Property to Wishlist">
                                    <i class="text-xs transition-colors"
                                       :class="isPropertySaved({{ $prop->id }}) ? 'fa-solid fa-heart text-red-500' : 'fa-regular fa-heart text-white'"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Card Body Content -->
                        <div class="p-6 pt-5 flex flex-col flex-1">
                            <!-- City -->
                            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#333] mb-1 font-sans">
                                {{ $prop->city }}
                            </p>

                            <!-- Property Title -->
                            <h2 class="font-fragment text-[24px] sm:text-[26px] uppercase tracking-[0.04em] text-[#111111] leading-tight mb-2 group-hover:text-[#c5983e] transition-colors">
                                <a href="{{ route('properties.show', $prop->slug) }}">
                                    {{ $prop->title }}
                                </a>
                            </h2>

                            <!-- Subtitle Description -->
                            <p class="text-[12px] text-gray-600 font-normal leading-snug font-sans mb-5">
                                {{ $subtitle }}
                            </p>

                            <!-- Amenity Specs Grid -->
                            <div class="mt-auto space-y-2.5 pt-2">
                                <!-- Row 1: Bedrooms, Bathrooms, Garage -->
                                <div class="grid grid-cols-3 gap-2 text-[11.5px] text-[#222] font-sans font-medium">
                                    <!-- Bedrooms -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-solid fa-bed text-[#c5983e] text-xs"></i>
                                        <span>{{ $prop->bedrooms ?? 4 }} Bedrooms</span>
                                    </div>

                                    <!-- Bathroom -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-solid fa-bath text-[#c5983e] text-xs"></i>
                                        <span>{{ (int)($prop->bathrooms ?? 6) }} Bathroom</span>
                                    </div>

                                    <!-- Garage -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-solid fa-warehouse text-[#c5983e] text-xs"></i>
                                        <span>{{ $prop->garage_spaces ?? 1 }} Garage</span>
                                    </div>
                                </div>

                                <!-- Row 2: sq.ft, Balcony -->
                                <div class="grid grid-cols-3 gap-2 text-[11.5px] text-[#222] font-sans font-medium">
                                    <!-- sq.ft -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-solid fa-ruler-combined text-[#c5983e] text-xs"></i>
                                        <span>{{ number_format($prop->sqft ?? 1400) }} sq.ft</span>
                                    </div>

                                    <!-- Balcony -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <i class="fa-solid fa-building text-[#c5983e] text-xs"></i>
                                        <span>{{ $prop->balcony ?? '8' }} Balcony</span>
                                    </div>
                                </div>

                                <!-- Card Action Footer -->
                                <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                                    <a href="{{ route('properties.show', $prop->slug) }}"
                                       class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-[#0b2112] hover:text-[#c5983e] transition-colors">
                                        <span>Explore Community</span>
                                        <i class="fa-solid fa-arrow-up rotate-45 text-[10px]"></i>
                                    </a>
                                    <button type="button"
                                            @click="openRegisterModal({{ $prop->id }}, '{{ addslashes($prop->title) }}')"
                                            class="text-[11px] uppercase tracking-[0.14em] font-semibold text-[#c5983e] hover:underline cursor-pointer">
                                        VIP Access
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewport = document.getElementById('cards-viewport');
            const track = document.getElementById('cards-track');
            const pills = document.querySelectorAll('.pg-num-pill[data-page]');
            const cards = document.querySelectorAll('.prop-slider-card');
            
            if (!viewport || !track || cards.length === 0) return;

            let currentIndex = 0;
            const totalCards = cards.length;
            const gap = 24;

            function getStep() {
                const card = cards[0];
                return card ? (card.offsetWidth + gap) : 380;
            }

            function getMaxIndex() {
                const step = getStep();
                const visibleCount = Math.max(1, Math.floor(viewport.clientWidth / step));
                return Math.max(0, totalCards - visibleCount);
            }

            function updateSlider(animated = true) {
                const step = getStep();
                const maxIndex = getMaxIndex();
                
                if (currentIndex < 0) currentIndex = 0;
                if (currentIndex > maxIndex) currentIndex = maxIndex;

                track.style.transition = animated ? 'transform 0.45s cubic-bezier(0.25, 1, 0.5, 1)' : 'none';

                let translateX = currentIndex * step;
                const maxTranslate = Math.max(0, track.scrollWidth - viewport.clientWidth);
                if (translateX > maxTranslate) translateX = maxTranslate;

                track.style.transform = `translateX(-${translateX}px)`;

                // Update active page pill (0, 1, 2)
                let activePage = 0;
                if (maxIndex > 0) {
                    const ratio = currentIndex / maxIndex;
                    if (ratio > 0.66) {
                        activePage = 2;
                    } else if (ratio > 0.25) {
                        activePage = 1;
                    } else {
                        activePage = 0;
                    }
                }
                pills.forEach((p, idx) => {
                    p.classList.toggle('active', idx === activePage);
                });

                // Update arrow button opacity / pointer-events
                const prevBtns = [document.getElementById('slider-prev-btn'), document.getElementById('pill-prev-btn')];
                const nextBtns = [document.getElementById('slider-next-btn'), document.getElementById('pill-next-btn')];

                prevBtns.forEach(btn => {
                    if (!btn) return;
                    if (currentIndex <= 0) {
                        btn.classList.add('opacity-30', 'cursor-not-allowed');
                        btn.classList.remove('hover:scale-105', 'hover:border-[#c5983e]');
                    } else {
                        btn.classList.remove('opacity-30', 'cursor-not-allowed');
                        btn.classList.add('hover:scale-105', 'hover:border-[#c5983e]');
                    }
                });

                nextBtns.forEach(btn => {
                    if (!btn) return;
                    if (currentIndex >= maxIndex) {
                        btn.classList.add('opacity-30', 'cursor-not-allowed');
                        btn.classList.remove('hover:scale-105', 'hover:border-[#c5983e]');
                    } else {
                        btn.classList.remove('opacity-30', 'cursor-not-allowed');
                        btn.classList.add('hover:scale-105', 'hover:border-[#c5983e]');
                    }
                });
            }

            window.slidePrev = function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider(true);
                }
            };

            window.slideNext = function() {
                const maxIndex = getMaxIndex();
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    updateSlider(true);
                }
            };

            window.goToPage = function(page) {
                const maxIndex = getMaxIndex();
                if (page === 0) {
                    currentIndex = 0;
                } else if (page === 1) {
                    currentIndex = Math.min(maxIndex, Math.round(maxIndex / 2));
                } else if (page === 2) {
                    currentIndex = maxIndex;
                }
                updateSlider(true);
            };

            // Touch & Drag Support
            let isDown = false;
            let startX = 0;

            viewport.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX;
            });

            window.addEventListener('mouseup', () => {
                isDown = false;
            });

            viewport.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                const x = e.pageX;
                const walk = (x - startX);
                if (Math.abs(walk) > 60) {
                    isDown = false;
                    if (walk < 0) {
                        window.slideNext();
                    } else {
                        window.slidePrev();
                    }
                }
            });

            // Touch events for mobile/tablet
            let touchStartX = 0;
            viewport.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            viewport.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        window.slideNext();
                    } else {
                        window.slidePrev();
                    }
                }
            }, { passive: true });

            // Keyboard navigation
            window.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') window.slidePrev();
                if (e.key === 'ArrowRight') window.slideNext();
            });

            window.addEventListener('resize', () => {
                updateSlider(false);
            });

            // Initialize
            updateSlider(false);
        });
    </script>
    @endpush

</x-layouts.app>
