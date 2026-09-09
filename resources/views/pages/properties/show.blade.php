<x-layouts.app activePage="properties" :title="$property->title . ' — Ethereal Estates'">

    <div x-data="{ currentTab: 'overview' }">

        <!-- ═══════════ HERO BANNER ═══════════ -->
        <div class="px-4 sm:px-8 lg:px-14 pt-4">
            <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl h-[480px] sm:h-[540px] lg:h-[600px] bg-gray-900">
                <img src="{{ $property->primary_image_url }}"
                     alt="{{ $property->title }}"
                     class="w-full h-full object-cover opacity-85" />
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/20"></div>

                <!-- Center Hero Copy -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 pb-24 sm:pb-28">
                    <span class="text-[#d5a94e] tracking-[0.25em] uppercase text-xs font-semibold mb-3">
                        {{ $property->city }}
                    </span>
                    <h1 class="font-fragment text-3xl sm:text-5xl lg:text-6xl text-white uppercase tracking-[0.06em] mb-3">
                        {{ $property->title }}
                    </h1>
                    @if($property->price_label)
                        <p class="text-white/90 text-sm md:text-base font-light tracking-wide mb-6">
                            {{ $property->price_label }}
                        </p>
                    @endif
                    <div class="flex items-center gap-4">
                        <button type="button"
                                @click="openRegisterModal({{ $property->id }}, '{{ addslashes($property->title) }}')"
                                class="btn-gold cursor-pointer shadow-lg">
                            Now Selling ↗
                        </button>
                        <form action="{{ route('properties.favorite', $property->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center gap-2 bg-black/50 hover:bg-black/80 backdrop-blur-md border border-white/20 text-white text-xs uppercase tracking-wider px-5 py-3 rounded cursor-pointer transition-colors">
                                <span>{{ $isSaved ? '♥ Saved' : '♡ Save Property' }}</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bottom Glassmorphism Info Bar -->
                <div class="absolute bottom-6 inset-x-6 lg:inset-x-12 rounded-xl p-5 sm:p-6 border border-white/15 bg-black/65 backdrop-blur-md">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-xs font-light text-white">
                        <div class="border-b md:border-b-0 md:border-r border-white/15 pb-3 md:pb-0 md:pr-4">
                            <p class="text-white/50 text-[10px] tracking-[0.16em] uppercase mb-1">Address</p>
                            <p class="font-medium text-white/95">{{ $property->address ?? $property->city }}</p>
                        </div>
                        <div class="border-b md:border-b-0 md:border-r border-white/15 pb-3 md:pb-0 md:pr-4">
                            <p class="text-white/50 text-[10px] tracking-[0.16em] uppercase mb-1">Community Type</p>
                            <p class="font-medium text-white/95">{{ $property->short_description ?? $property->property_type }}</p>
                        </div>
                        <div>
                            <p class="text-white/50 text-[10px] tracking-[0.16em] uppercase mb-1">Model Home &amp; Presentation</p>
                            <p class="font-medium text-white/95">{{ $property->model_home_address ?? 'Open Daily by Appointment' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══════════ SCROLL-CONTROLLED BUILD-UP VIDEO SEQUENCE (per specification) ═══════════ -->
        <section class="px-4 sm:px-8 lg:px-14 pt-6 pb-2 bg-white"
                 x-data="{
                     progress: 0,
                     init() {
                         const el = this.$refs.seqWrap;
                         const video = this.$refs.seqVideo;
                         window.addEventListener('scroll', () => {
                             if (!el) return;
                             const rect = el.getBoundingClientRect();
                             const winH = window.innerHeight;
                             if (rect.top < winH && rect.bottom > 0) {
                                 const total = winH + rect.height;
                                 const current = winH - rect.top;
                                 const ratio = Math.min(Math.max(current / total, 0), 1);
                                 this.progress = ratio;
                                 if (video && video.duration && !isNaN(video.duration)) {
                                     video.currentTime = video.duration * ratio;
                                 }
                             }
                         }, { passive: true });
                     }
                 }"
                 x-ref="seqWrap">
            <div class="max-w-7xl mx-auto rounded-2xl overflow-hidden bg-[#06130d] text-white p-8 sm:p-12 lg:p-14 shadow-2xl relative border border-white/10">
                <div class="max-w-2xl mb-8">
                    <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-2">Construction Evolution</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] text-white mb-3">
                        Architectural Build-Up Sequence
                    </h2>
                    <p class="text-xs sm:text-sm text-white/70 font-light leading-relaxed">
                        Scroll through the section to scrub the architectural build-up and development progress of {{ $property->title }}.
                    </p>
                </div>

                <div class="relative w-full rounded-xl overflow-hidden aspect-[16/9] bg-black shadow-inner">
                    <video x-ref="seqVideo"
                           class="w-full h-full object-cover"
                           muted playsinline preload="auto">
                        <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
                    </video>
                    
                    <!-- Progress Line Indicator -->
                    <div class="absolute bottom-0 inset-x-0 h-1.5 bg-white/15">
                        <div class="h-full bg-[#c5983e] transition-all duration-75" :style="'width: ' + (progress * 100) + '%'"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════ SUB-NAV TABS ═══════════ -->
        <div class="sticky top-[65px] z-30 bg-white/95 backdrop-blur-md border-b border-gray-200 px-6 lg:px-14 py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-2 overflow-x-auto">
                    <button type="button"
                            @click="currentTab = 'overview'"
                            class="px-5 py-2 rounded-full text-xs font-medium uppercase tracking-wider transition-all cursor-pointer"
                            :class="currentTab === 'overview' ? 'bg-[#06130d] text-white' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-100'">
                        Overview
                    </button>
                    <button type="button"
                            @click="currentTab = 'neighborhood'"
                            class="px-5 py-2 rounded-full text-xs font-medium uppercase tracking-wider transition-all cursor-pointer"
                            :class="currentTab === 'neighborhood' ? 'bg-[#06130d] text-white' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-100'">
                        Neighborhood
                    </button>
                    <button type="button"
                            @click="currentTab = 'gallery'"
                            class="px-5 py-2 rounded-full text-xs font-medium uppercase tracking-wider transition-all cursor-pointer"
                            :class="currentTab === 'gallery' ? 'bg-[#06130d] text-white' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-100'">
                        Gallery
                    </button>
                    <button type="button"
                            @click="currentTab = 'floorplans'"
                            class="px-5 py-2 rounded-full text-xs font-medium uppercase tracking-wider transition-all cursor-pointer"
                            :class="currentTab === 'floorplans' ? 'bg-[#06130d] text-white' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-100'">
                        Floor Plans
                    </button>
                </div>

                <div class="flex items-center gap-4">
                    <button type="button"
                            @click="openRegisterModal({{ $property->id }}, '{{ addslashes($property->title) }}')"
                            class="text-xs uppercase tracking-[0.16em] font-semibold text-[#d5a94e] hover:text-[#e3b961] transition-colors cursor-pointer">
                        Register For VIP Access ↗
                    </button>
                </div>
            </div>
        </div>

        <!-- ═══════════ TAB 1: OVERVIEW ═══════════ -->
        <section x-show="currentTab === 'overview'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Left Details Column -->
                <div class="lg:col-span-5 lg:sticky lg:top-32">
                    <span class="text-[#d5a94e] uppercase tracking-[0.24em] text-xs font-semibold block mb-2">The Collection</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] leading-tight text-gray-900 mb-6">
                        Following the incredible success of previous releases, Ethereal Estates proudly presents {{ $property->title }}.
                    </h2>
                    <div class="gold-line"></div>
                    <p class="text-sm font-light text-gray-600 leading-relaxed mb-8">
                        {{ $property->short_description ?? 'A signature residential collection offering exceptional value, lasting quality, and a location that supports everyday convenience.' }}
                    </p>

                    <!-- Quick Specifications Box -->
                    <div class="p-6 rounded-xl bg-[#fdfaf4] border border-gray-200">
                        <p class="text-[11px] uppercase tracking-[0.18em] font-bold text-gray-400 mb-4">Quick Specifications</p>
                        <div class="grid grid-cols-2 gap-4 text-xs text-gray-600">
                            <div>Bedrooms: <strong class="text-gray-900 font-semibold">{{ $property->bedrooms }} Beds</strong></div>
                            <div>Bathrooms: <strong class="text-gray-900 font-semibold">{{ (int)$property->bathrooms }} Baths</strong></div>
                            <div>Sq Footage: <strong class="text-gray-900 font-semibold">{{ number_format($property->sqft) }} Sq.Ft</strong></div>
                            <div>Garages: <strong class="text-gray-900 font-semibold">{{ $property->garage }} Garage</strong></div>
                            <div>Property Type: <strong class="text-gray-900 font-semibold">{{ $property->property_type }}</strong></div>
                            <div>Status: <strong class="text-[#d5a94e] font-semibold uppercase">{{ str_replace('_', ' ', $property->status) }}</strong></div>
                        </div>
                    </div>
                </div>

                <!-- Right Narrative & Architecture Column -->
                <div class="lg:col-span-7 space-y-8">
                    @if($property->images->count() > 1)
                        <div class="rounded-2xl overflow-hidden aspect-[16/10] bg-gray-100 shadow-md">
                            <img src="{{ $property->images[1]->full_url }}" alt="{{ $property->title }} interior" class="w-full h-full object-cover" />
                        </div>
                    @endif

                    <div class="text-sm font-light text-gray-700 leading-relaxed space-y-4">
                        {!! nl2br(e($property->full_description)) !!}
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <div class="p-6 border border-gray-200 rounded-xl">
                            <h3 class="font-fragment text-lg uppercase tracking-wide text-gray-900 mb-2">Gourmet Chef Kitchens</h3>
                            <p class="text-xs font-light text-gray-500 leading-relaxed">
                                Quartz countertops, European soft-close cabinetry, and integrated panel-ready appliance provisions.
                            </p>
                        </div>
                        <div class="p-6 border border-gray-200 rounded-xl">
                            <h3 class="font-fragment text-lg uppercase tracking-wide text-gray-900 mb-2">Primary Ensuites</h3>
                            <p class="text-xs font-light text-gray-500 leading-relaxed">
                                Spa-inspired freestanding soaker tubs, frameless glass showers, and heated porcelain flooring.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ═══════════ TAB 2: NEIGHBORHOOD ═══════════ -->
        <section x-show="currentTab === 'neighborhood'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white" style="display: none;">
            <div class="max-w-7xl mx-auto">
                <div class="max-w-3xl mb-12">
                    <span class="text-[#d5a94e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Location &amp; Lifestyle</span>
                    <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 mb-4">
                        Historic {{ $property->city }} Charms
                    </h2>
                    <p class="text-sm font-light text-gray-600 leading-relaxed">
                        Nestled in a scenic, family-friendly enclave with parks, conservation areas, reputable schools, and rapid Highway 407 &amp; GO Transit connections.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <div class="p-6 border border-gray-200 rounded-xl bg-[#fdfaf4]">
                        <h4 class="font-fragment text-base uppercase tracking-wide text-gray-900 mb-1">Parks &amp; Trails</h4>
                        <p class="text-xs font-light text-gray-500">Valleys, conservation lands, and waterfront parks within minutes.</p>
                    </div>
                    <div class="p-6 border border-gray-200 rounded-xl bg-[#fdfaf4]">
                        <h4 class="font-fragment text-base uppercase tracking-wide text-gray-900 mb-1">Top Schools</h4>
                        <p class="text-xs font-light text-gray-500">Reputable elementary and secondary schools close to the neighborhood.</p>
                    </div>
                    <div class="p-6 border border-gray-200 rounded-xl bg-[#fdfaf4]">
                        <h4 class="font-fragment text-base uppercase tracking-wide text-gray-900 mb-1">Hwy 407 &amp; GO</h4>
                        <p class="text-xs font-light text-gray-500">Seamless transit to Downtown Toronto, Markham, and Durham employment hubs.</p>
                    </div>
                    <div class="p-6 border border-gray-200 rounded-xl bg-[#fdfaf4]">
                        <h4 class="font-fragment text-base uppercase tracking-wide text-gray-900 mb-1">Historic Downtown</h4>
                        <p class="text-xs font-light text-gray-500">Artisan bakeries, local markets, family bistros, and street festivals.</p>
                    </div>
                </div>

                <!-- Map / Presentation Center Callout -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-[21/9] bg-gray-200 flex items-center justify-center p-6 text-center">
                    <img src="{{ asset('assets/images/contact-map.jpg') }}" alt="Area map" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="relative z-10 bg-white/95 backdrop-blur-md p-6 sm:p-8 rounded-xl shadow-2xl max-w-md border border-gray-100">
                        <p class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#d5a94e] mb-1">Sales Centre &amp; Presentation Gallery</p>
                        <h3 class="font-fragment text-xl text-gray-900 mb-2">{{ $property->model_home_address ?? '132 Ronald Hooper Avenue' }}</h3>
                        <p class="text-xs text-gray-600 mb-4">{{ $property->city }}, ON — Open Daily by Appointment</p>
                        <a href="https://maps.google.com/?q={{ urlencode($property->address . ' ' . $property->city) }}" target="_blank" class="btn-forest text-xs">
                            Get Driving Directions ↗
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════ TAB 3: GALLERY ═══════════ -->
        <section x-show="currentTab === 'gallery'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white" style="display: none;">
            <div class="max-w-7xl mx-auto">
                <span class="text-[#d5a94e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Visual Showcase</span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 mb-10">Architecture &amp; Interior Gallery</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($property->images as $img)
                        <div class="rounded-xl overflow-hidden aspect-[4/3] bg-gray-100 group shadow-sm">
                            <img src="{{ $img->full_url }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ═══════════ TAB 4: FLOOR PLANS ═══════════ -->
        <section x-show="currentTab === 'floorplans'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white" style="display: none;">
            <div class="max-w-7xl mx-auto">
                <span class="text-[#d5a94e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Bespoke Layouts</span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 mb-3">Lot Collections &amp; Floor Plans</h2>
                <p class="text-sm font-light text-gray-600 mb-10">Explore our signature lot collections with multiple elevation choices and custom builder options.</p>

                @if($property->floorPlans->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($property->floorPlans as $plan)
                            <div class="border border-gray-200 rounded-xl p-6 bg-white hover:border-[#d5a94e] transition-colors flex flex-col shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#d5a94e]">{{ $plan->lot_collection }}</span>
                                    <span class="text-[11px] text-gray-400">Elevation {{ $plan->elevation }}</span>
                                </div>
                                <h3 class="font-fragment text-2xl uppercase tracking-wide text-gray-900 mb-2">{{ $plan->name }}</h3>
                                <p class="text-xs font-light text-gray-500 leading-relaxed mb-6">{{ $plan->description }}</p>

                                <div class="aspect-[4/3] bg-[#fdfaf4] border border-dashed border-gray-200 rounded-lg flex flex-col items-center justify-center p-4 mb-6">
                                    <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span class="text-[11px] text-gray-400 uppercase tracking-widest">Architectural Schematic</span>
                                </div>

                                <div class="flex items-center justify-between text-xs text-gray-700 border-t border-gray-100 pt-4 mb-6">
                                    <span>{{ $plan->beds }} Beds</span>
                                    <span>&bull;</span>
                                    <span>{{ $plan->baths }} Baths</span>
                                    <span>&bull;</span>
                                    <span>{{ number_format($plan->sqft) }} Sq.Ft</span>
                                </div>

                                <button type="button"
                                        @click="openRegisterModal({{ $property->id }}, '{{ addslashes($property->title) }} ({{ $plan->name }})')"
                                        class="w-full btn-forest text-xs justify-center py-3 mt-auto cursor-pointer">
                                    Request Floor Plan ↗
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-12 text-center bg-[#fdfaf4] rounded-xl border border-gray-200">
                        <p class="font-fragment text-xl text-gray-800 uppercase mb-2">Floor Plans Available Upon VIP Request</p>
                        <p class="text-xs text-gray-500 font-light mb-6">Register your interest to receive detailed elevations, lot availability, and architectural drawings.</p>
                        <button type="button"
                                @click="openRegisterModal({{ $property->id }}, '{{ addslashes($property->title) }}')"
                                class="btn-gold text-xs">
                            Request Floor Plan Package ↗
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <!-- ═══════════ SIMILAR PROPERTIES SECTION ═══════════ -->
        <section class="py-16 lg:py-20 px-6 lg:px-14 bg-[#fdfaf4] border-t border-gray-200/80">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-end justify-between mb-10">
                    <div>
                        <span class="text-[11px] uppercase tracking-[0.22em] text-[#d5a94e] font-semibold block mb-1">More In This Area</span>
                        <h2 class="font-fragment text-2xl sm:text-3xl uppercase tracking-[0.04em] text-gray-900">Similar Distinctive Homes</h2>
                    </div>
                    <a href="{{ route('properties.index') }}" class="text-xs uppercase tracking-widest font-semibold text-[#d5a94e] hover:underline">
                        View All Properties ↗
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($similarProperties as $sim)
                        <x-property-card :property="$sim" />
                    @endforeach
                </div>
            </div>
        </section>

    </div>

</x-layouts.app>
