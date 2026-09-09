<x-layouts.app activePage="properties" title="Featured Properties — Ethereal Estates Living Across Ontario">

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
        /* Desktop: 3 cards fit with 4th card peeking on right (~3.25 cards in view) */
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
            border-color: #d5a94e80;
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

        /* Pagination Pills */
        .pg-pill {
            font-size: 13px;
            letter-spacing: 0.08em;
            color: #999999;
            cursor: pointer;
            padding: 2px 6px;
            transition: color 0.2s ease, font-weight 0.2s ease;
            user-select: none;
            font-family: 'Urbanist', sans-serif;
        }
        .pg-pill.active {
            color: #111111;
            font-weight: 700;
        }
        .pg-pill:hover {
            color: #d5a94e;
        }
    </style>
    @endpush

    <!-- ═══════════ SUBHEADER ROW (exact match with media_1788798411860.png) ═══════════ -->
    <div class="bg-white border-b border-gray-100 py-3.5 px-6 sm:px-10 lg:px-14">
        <div class="flex items-center justify-between">
            
            <!-- Left: Back link + (Properties) label -->
            <div class="flex flex-col items-start gap-0.5 z-10">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-[0.14em] text-gray-500 hover:text-[#d5a94e] transition-colors font-sans">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>
                <span class="font-fragment italic text-xl sm:text-2xl text-[#b8860b] tracking-wide leading-tight select-none">
                    (Properties)
                </span>
            </div>

            <!-- Centre: Heading "ETHEREAL ESTATES LIVING ACROSS ONTARIO" -->
            <h1 class="font-fragment text-xl sm:text-2xl md:text-3xl lg:text-[34px] uppercase tracking-[0.05em] text-[#111111] absolute left-1/2 -translate-x-1/2 text-center whitespace-nowrap leading-tight select-none font-normal">
                Ethereal Estates Living Across Ontario
            </h1>

            <!-- Right: Pagination Pills (1) (2) (3) -->
            <div id="pg-pills" class="flex items-center gap-1 shrink-0 z-10">
                <span class="pg-pill active" data-page="0" onclick="goToPage(0)">(1)</span>
                <span class="pg-pill" data-page="1" onclick="goToPage(1)">(2)</span>
                <span class="pg-pill" data-page="2" onclick="goToPage(2)">(3)</span>
            </div>

        </div>
    </div>

    <!-- ═══════════ HORIZONTAL CARDS SLIDER (exact match with media_1788798411860.png) ═══════════ -->
    <div class="w-full py-8 sm:py-10 px-6 sm:px-10 lg:px-14 overflow-hidden bg-white select-none">
        <div id="cards-viewport">
            <div id="cards-track">

                @foreach($properties as $index => $prop)
                    @php
                        $subtitle = $prop->short_description ?? 'Bungalows and Single Detached Homes with 2 & 3-Car Garages';
                    @endphp

                    <a href="{{ route('properties.show', $prop->slug) }}"
                       class="prop-slider-card group"
                       data-index="{{ $index }}">

                        <!-- Top Property Image Thumbnail -->
                        <div class="w-full h-[250px] sm:h-[270px] bg-gray-100 overflow-hidden shrink-0">
                            <img src="{{ $prop->primary_image_url }}"
                                 alt="{{ $prop->title }}"
                                 class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out"
                                 loading="lazy" />
                        </div>

                        <!-- Card Body Content -->
                        <div class="p-6 pt-5 flex flex-col flex-1">
                            <!-- City -->
                            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#333] mb-1 font-sans">
                                {{ $prop->city }}
                            </p>

                            <!-- Property Title -->
                            <h2 class="font-fragment text-[24px] sm:text-[26px] uppercase tracking-[0.04em] text-[#111111] leading-tight mb-2 group-hover:text-[#d5a94e] transition-colors">
                                {{ $prop->title }}
                            </h2>

                            <!-- Subtitle Description -->
                            <p class="text-[12px] text-[#444] font-normal leading-snug font-sans mb-5">
                                {{ $subtitle }}
                            </p>

                            <!-- Amenity Specs Grid (Exact 2 Rows from Figma Screenshot) -->
                            <div class="mt-auto space-y-2.5 pt-2">
                                <!-- Row 1: Bedrooms, Bathrooms, Garage -->
                                <div class="grid grid-cols-3 gap-2 text-[11.5px] text-[#222] font-sans font-medium">
                                    <!-- Bedrooms -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4 text-[#c5983e] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M2 19h2v-2h16v2h2v-7a3 3 0 00-3-3H9a3 3 0 00-3 3v1H4V6H2v13zm4-7a1 1 0 011-1h10a1 1 0 011 1v3H6v-3zm2-3a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                        <span>{{ $prop->bedrooms ?? 4 }} Bedrooms</span>
                                    </div>

                                    <!-- Bathroom -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4 text-[#c5983e] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 13V8a1 1 0 00-1-1h-2V5a2 2 0 00-2-2h-1a1 1 0 000 2h1v2H4a2 2 0 00-2 2v6a4 4 0 004 4v1a1 1 0 102 0v-1h8v1a1 1 0 102 0v-1a4 4 0 004-4v-2h-2zm0 0H4v-4h16v4z"/>
                                        </svg>
                                        <span>{{ (int)($prop->bathrooms ?? 6) }} Bathroom</span>
                                    </div>

                                    <!-- Garage -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4 text-[#c5983e] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 3L2 10v11h20V10L12 3zm6 16H6v-7h12v7zm-2-2h-8v-3h8v3z"/>
                                        </svg>
                                        <span>{{ $prop->garage_spaces ?? 1 }} Garage</span>
                                    </div>
                                </div>

                                <!-- Row 2: sq.ft, Balcony -->
                                <div class="grid grid-cols-3 gap-2 text-[11.5px] text-[#222] font-sans font-medium">
                                    <!-- sq.ft -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4 text-[#c5983e] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M4 3h4v11h11v4H4V3zm2 2v11h2v-2h2v2h2v-2h2v2h2v-2h1v-1H8V5H6z"/>
                                        </svg>
                                        <span>{{ number_format($prop->sqft ?? 1400) }} sq.ft</span>
                                    </div>

                                    <!-- Balcony -->
                                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4 text-[#c5983e] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 6h18v2H3V6zm1 4h2v8H4v-8zm4 0h2v8H8v-8zm4 0h2v8h-2v-8zm4 0h2v8h-2v-8zm4 0h2v8h-2v-8zM2 19h20v2H2v-2z"/>
                                        </svg>
                                        <span>8 Balcony</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </a>
                @endforeach

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewport = document.getElementById('cards-viewport');
            const track = document.getElementById('cards-track');
            const pills = document.querySelectorAll('.pg-pill');
            const cards = document.querySelectorAll('.prop-slider-card');
            
            if (!viewport || !track || cards.length === 0) return;

            let currentPage = 0;
            const totalCards = cards.length;
            const gap = 24;

            function getStep() {
                const card = cards[0];
                return card ? card.offsetWidth + gap : 380;
            }

            function updateSlider(animated = true) {
                const step = getStep();
                track.style.transition = animated ? 'transform 0.5s cubic-bezier(0.25, 1, 0.5, 1)' : 'none';
                
                // Jump 3 cards per page
                let targetIndex = currentPage * 3;
                if (targetIndex > totalCards - 3) {
                    targetIndex = Math.max(0, totalCards - 3);
                }

                track.style.transform = `translateX(-${targetIndex * step}px)`;

                // Update active pill
                pills.forEach((p, idx) => {
                    p.classList.toggle('active', idx === currentPage);
                });
            }

            window.goToPage = function(page) {
                currentPage = page;
                updateSlider(true);
            };

            // Touch & Drag Support
            let isDown = false;
            let startX, scrollLeft;

            viewport.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX;
                track.style.transition = 'none';
            });

            window.addEventListener('mouseup', () => {
                if (!isDown) return;
                isDown = false;
                updateSlider(true);
            });

            viewport.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                const x = e.pageX;
                const walk = (x - startX);
                if (Math.abs(walk) > 80) {
                    isDown = false;
                    if (walk < 0 && currentPage < 2) {
                        currentPage++;
                    } else if (walk > 0 && currentPage > 0) {
                        currentPage--;
                    }
                    updateSlider(true);
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
                    if (diff > 0 && currentPage < 2) {
                        currentPage++;
                    } else if (diff < 0 && currentPage > 0) {
                        currentPage--;
                    }
                    updateSlider(true);
                }
            }, { passive: true });

            window.addEventListener('resize', () => {
                updateSlider(false);
            }, { passive: true });

            // Initialize
            updateSlider(false);
        });
    </script>
    @endpush

</x-layouts.app>
