<x-layouts.app activePage="properties" title="Distinctive Homes. Considered Choices. — Ethereal Estates">

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
            color: #c5983e;
            font-weight: 700;
        }
        .pg-pill:hover {
            color: #c5983e;
        }
    </style>
    @endpush

    <!-- ═══════════ SUBHEADER ROW ═══════════ -->
    <div class="bg-white border-b border-gray-100 py-3.5 px-6 sm:px-10 lg:px-14">
        <div class="flex items-center justify-between">
            
            <!-- Left: Back link (bracketed category label removed per specification) -->
            <div class="flex items-center gap-2 z-10">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-[0.16em] text-gray-500 hover:text-[#c5983e] transition-colors font-sans">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>
            </div>

            <!-- Centre: Heading "DISTINCTIVE HOMES. CONSIDERED CHOICES." (per specification) -->
            <h1 class="font-fragment text-xl sm:text-2xl md:text-3xl lg:text-[32px] uppercase tracking-[0.06em] text-[#111111] absolute left-1/2 -translate-x-1/2 text-center whitespace-nowrap leading-tight select-none font-normal">
                Distinctive Homes. Considered Choices.
            </h1>

            <!-- Right: Spacer -->
            <div class="w-16 hidden sm:block"></div>
        </div>
    </div>

    <!-- ═══════════ HORIZONTAL CARDS SLIDER SECTION ═══════════ -->
    <section class="py-10 lg:py-14 bg-white overflow-hidden">
        <div class="w-full pl-6 sm:pl-10 lg:pl-14 pr-0">
            
            <!-- Slider Viewport -->
            <div id="cards-viewport">
                <div id="cards-track">
                    
                    @foreach($properties as $index => $prop)
                        @php
                            $images = $prop->images->pluck('full_url')->toArray();
                            if (empty($images)) {
                                $images = [$prop->primary_image_url];
                            }
                            $sqft = $prop->sqft ? number_format($prop->sqft) : '1,400';
                            $balcony = $prop->balcony ?? '8';
                            $priceText = $prop->price_label ?? 'STARTING FROM $' . number_format($prop->price ?? 999900) . '*';
                            $featureLine = $prop->feature_line ?? 'Detached home with a double garage.';
                        @endphp

                        <div class="prop-slider-card group" data-card-index="{{ $index }}">
                            
                            <!-- Card Image with Top Badge & Favorite Button -->
                            <div class="relative w-full aspect-[16/11] bg-gray-100 overflow-hidden select-none">
                                <img src="{{ $prop->primary_image_url }}"
                                     alt="{{ $prop->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                     loading="lazy" />

                                <!-- Top Left: Category Tag -->
                                <div class="absolute top-3 left-3 z-10 pointer-events-none">
                                    <span class="px-2.5 py-1 rounded bg-black/60 backdrop-blur-md text-[9px] uppercase tracking-[0.16em] text-white font-medium">
                                        {{ $prop->category->name ?? 'Single Detached' }}
                                    </span>
                                </div>

                                <!-- Top Right: Save Button -->
                                <div class="absolute top-3 right-3 z-10">
                                    <form action="{{ route('properties.favorite', $prop->id) }}" method="POST" class="inline" onclick="event.stopPropagation()">
                                        @csrf
                                        <button type="submit"
                                                class="w-7 h-7 rounded-full bg-black/50 hover:bg-black/80 backdrop-blur-md flex items-center justify-center text-white/90 hover:text-white transition-colors cursor-pointer text-xs"
                                                title="Save Property">
                                            ♥
                                        </button>
                                    </form>
                                </div>

                                <!-- Bottom Image Dots -->
                                <div class="absolute bottom-2.5 inset-x-0 flex items-center justify-center gap-1.5 z-10 pointer-events-none">
                                    <span class="w-3 h-3 rounded-full border border-white flex items-center justify-center">
                                        <span class="w-1 h-1 rounded-full bg-[#c5983e]"></span>
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-white/80"></span>
                                    <span class="w-1 h-1 rounded-full bg-white/80"></span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <!-- City Subtitle -->
                                    <p class="text-[10px] uppercase tracking-[0.2em] font-semibold text-gray-400 mb-1">
                                        {{ $prop->city }}
                                    </p>

                                    <!-- Property Title -->
                                    <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-[0.04em] text-[#111111] leading-tight mb-2 hover:text-[#c5983e] transition-colors">
                                        <a href="{{ route('properties.show', $prop->slug) }}">
                                            {{ $prop->title }}
                                        </a>
                                    </h3>

                                    <!-- Price Banner -->
                                    <p class="text-xs font-semibold text-[#c5983e] uppercase tracking-wider mb-2">
                                        {{ $priceText }}
                                    </p>

                                    <!-- Feature Line in italics -->
                                    <p class="text-[11px] text-gray-500 italic mb-4 font-serif">
                                        {{ $featureLine }}
                                    </p>

                                    <!-- 2-Row Amenity Specification Grid -->
                                    <div class="grid grid-cols-3 gap-2 py-3 border-y border-gray-100 mb-4 text-center">
                                        <div>
                                            <p class="text-[9px] uppercase tracking-wider text-gray-400">Beds</p>
                                            <p class="text-xs font-bold text-gray-900 mt-0.5">{{ $prop->bedrooms ?? 4 }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[9px] uppercase tracking-wider text-gray-400">Baths</p>
                                            <p class="text-xs font-bold text-gray-900 mt-0.5">{{ (int)($prop->bathrooms ?? 6) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[9px] uppercase tracking-wider text-gray-400">Sq.Ft</p>
                                            <p class="text-xs font-bold text-gray-900 mt-0.5">{{ $sqft }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Action Footer -->
                                <div class="pt-2 flex items-center justify-between">
                                    <a href="{{ route('properties.show', $prop->slug) }}"
                                       class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-[#1a2e1e] hover:text-[#c5983e] transition-colors">
                                        Explore Community <span class="text-sm">↗</span>
                                    </a>
                                    <button type="button"
                                            @click="openRegisterModal({{ $prop->id }}, '{{ addslashes($prop->title) }}')"
                                            class="text-[10.5px] uppercase tracking-[0.14em] font-semibold text-[#c5983e] hover:underline cursor-pointer">
                                        VIP Access
                                    </button>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Page Numbering at Bottom Centre (per specification) -->
            <div id="pg-pills" class="flex items-center justify-center gap-2 mt-8 select-none">
                <span class="pg-pill active" data-page="0" onclick="goToPage(0)">(1)</span>
                <span class="pg-pill" data-page="1" onclick="goToPage(1)">(2)</span>
                <span class="pg-pill" data-page="2" onclick="goToPage(2)">(3)</span>
            </div>

        </div>
    </section>

    @push('scripts')
    <script>
        (function() {
            const viewport = document.getElementById('cards-viewport');
            const track = document.getElementById('cards-track');
            const pills = document.querySelectorAll('.pg-pill');
            if (!viewport || !track) return;

            let currentPage = 0;
            const totalPages = 3;

            function updateSlider() {
                const card = track.querySelector('.prop-slider-card');
                if (!card) return;
                const cardWidth = card.offsetWidth;
                const gap = 24;
                const step = (cardWidth + gap) * 2;
                track.style.transform = `translateX(-${currentPage * step}px)`;

                pills.forEach((p, idx) => {
                    if (idx === currentPage) {
                        p.classList.add('active');
                    } else {
                        p.classList.remove('active');
                    }
                });
            }

            window.goToPage = function(page) {
                currentPage = Math.max(0, Math.min(page, totalPages - 1));
                updateSlider();
            };

            // Touch Swipe Support
            let startX = 0;
            let currentX = 0;
            let isDragging = false;

            viewport.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                isDragging = true;
            }, { passive: true });

            viewport.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                currentX = e.touches[0].clientX;
            }, { passive: true });

            viewport.addEventListener('touchend', () => {
                if (!isDragging) return;
                isDragging = false;
                const diff = startX - currentX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0 && currentPage < totalPages - 1) {
                        goToPage(currentPage + 1);
                    } else if (diff < 0 && currentPage > 0) {
                        goToPage(currentPage - 1);
                    }
                }
            });

            // Window resize handler
            window.addEventListener('resize', updateSlider);
        })();
    </script>
    @endpush

</x-layouts.app>
