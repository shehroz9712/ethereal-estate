<x-layouts.app activePage="properties" :title="$property->title . ' — Ethereal Estates'">

    <div x-data="{ 
            currentTab: 'overview',
            unlockModalOpen: false,
            unlockSubmitted: false,
            unlockLoading: false,
            unlockName: '{{ auth()->user()?->name ?? '' }}',
            unlockEmail: '{{ auth()->user()?->email ?? '' }}',
            unlockPhone: '{{ auth()->user()?->phone ?? '' }}',
            selectedPlan: '',
            openUnlockModal(plan = '') {
                this.selectedPlan = plan;
                this.unlockSubmitted = false;
                this.unlockModalOpen = true;
            },
            submitUnlockForm() {
                this.unlockLoading = true;
                fetch('{{ route('inquiries.register') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        first_name: this.unlockName || 'VIP Buyer',
                        email: this.unlockEmail,
                        phone: this.unlockPhone,
                        property_id: {{ $property->id }},
                        notes: 'Requested floor plan unlock for {{ addslashes($property->title) }}' + (this.selectedPlan ? ' — Plan: ' + this.selectedPlan : '')
                    })
                })
                .then(r => r.json())
                .then(data => {
                    this.unlockLoading = false;
                    this.unlockSubmitted = true;
                })
                .catch(() => {
                    this.unlockLoading = false;
                    this.unlockSubmitted = true;
                });
            }
         }">

        <!-- ═══════════ HERO BANNER ═══════════ -->
        <div class="px-4 sm:px-8 lg:px-14 pt-4">
            <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl h-[480px] sm:h-[540px] lg:h-[600px] bg-gray-900">
                <img src="{{ $property->primary_image_url }}"
                     alt="{{ $property->title }}"
                     class="w-full h-full object-cover opacity-85" />
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/20"></div>

                <!-- Center Hero Copy -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 pb-24 sm:pb-28">
                    <span class="text-[#c5983e] tracking-[0.25em] uppercase text-xs font-semibold mb-3">
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

                    <!-- CTAs: Register Here For Full Access + Save to Wishlist -->
                    <div class="flex flex-wrap items-center justify-center gap-3.5">
                        <button type="button"
                                @click="openUnlockModal('All Available Plans')"
                                class="px-7 py-3.5 rounded-full bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold transition-all shadow-xl flex items-center gap-2 cursor-pointer">
                            <span>Register Here For Full Access</span>
                            <span>↗</span>
                        </button>

                        <button type="button"
                                @click="openUnlockModal('Floor Plan Package')"
                                class="px-6 py-3.5 rounded-full bg-white/15 hover:bg-white/25 border border-white/30 text-white text-xs uppercase tracking-wider font-semibold backdrop-blur-md transition-all cursor-pointer">
                            Unlock Floor Plans
                        </button>

                        <!-- Wishlist Toggle -->
                        <button type="button"
                                @click="toggleSaveProperty({ id: {{ $property->id }}, title: '{{ addslashes($property->title) }}', city: '{{ addslashes($property->city) }}', price: '{{ addslashes($property->formatted_price) }}', image: '{{ $property->primary_image_url }}', url: '{{ route('properties.show', $property->slug) }}' })"
                                class="px-5 py-3.5 rounded-full bg-black/50 hover:bg-black/80 backdrop-blur-md border border-white/20 text-white text-xs uppercase tracking-wider transition-colors cursor-pointer flex items-center gap-2">
                            <span :class="isPropertySaved({{ $property->id }}) ? 'text-red-400' : 'text-white'"
                                  x-text="isPropertySaved({{ $property->id }}) ? '♥ Saved to Wishlist' : '♡ Save Property'">
                            </span>
                        </button>
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

        <!-- ═══════════ SUB-NAV TABS ═══════════ -->
        <div class="sticky top-[68px] z-30 bg-white/95 backdrop-blur-md border-b border-gray-200 px-6 lg:px-14 py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar">
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
                            @click="openUnlockModal('VIP Priority Access')"
                            class="text-xs uppercase tracking-[0.16em] font-semibold text-[#c5983e] hover:text-[#b08432] transition-colors cursor-pointer">
                        Register Here For Full Access ↗
                    </button>
                </div>
            </div>
        </div>

        <!-- ═══════════ TAB 1: OVERVIEW ═══════════ -->
        <section x-show="currentTab === 'overview'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Left Details Column -->
                <div class="lg:col-span-5 lg:sticky lg:top-32">
                    <span class="text-[#c5983e] uppercase tracking-[0.24em] text-xs font-semibold block mb-2">The Collection</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] leading-tight text-gray-900 mb-6">
                        Following the incredible success of previous releases, Ethereal Estates proudly presents {{ $property->title }}.
                    </h2>
                    <div class="w-12 h-[2px] bg-[#c5983e] mb-6"></div>
                    <p class="text-sm font-light text-gray-600 leading-relaxed mb-8">
                        {{ $property->short_description ?? 'A signature residential collection offering exceptional value, lasting quality, and a location that supports everyday convenience.' }}
                    </p>

                    <!-- Quick Specifications Box -->
                    <div class="p-6 rounded-xl bg-[#fdfaf4] border border-gray-200 mb-6">
                        <p class="text-[11px] uppercase tracking-[0.18em] font-bold text-gray-400 mb-4">Quick Specifications</p>
                        <div class="grid grid-cols-2 gap-4 text-xs text-gray-600">
                            <div>Bedrooms: <strong class="text-gray-900 font-semibold">{{ $property->bedrooms }} Beds</strong></div>
                            <div>Bathrooms: <strong class="text-gray-900 font-semibold">{{ (int)$property->bathrooms }} Baths</strong></div>
                            <div>Sq Footage: <strong class="text-gray-900 font-semibold">{{ number_format($property->sqft) }} Sq.Ft</strong></div>
                            <div>Garages: <strong class="text-gray-900 font-semibold">{{ $property->garage }} Garage</strong></div>
                            <div>House Type: <strong class="text-gray-900 font-semibold">{{ $property->property_type }}</strong></div>
                            <div>Status: <strong class="text-[#c5983e] font-semibold uppercase">{{ str_replace('_', ' ', $property->status) }}</strong></div>
                        </div>
                    </div>

                    <!-- Direct VIP CTA Banner -->
                    <div class="p-5 rounded-xl bg-[#0b2112] text-white flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-wider text-[#c5983e] font-bold">VIP Platinum Access</p>
                            <p class="text-[11px] text-white/70">Floor plans &amp; price lists available</p>
                        </div>
                        <button type="button"
                                @click="openUnlockModal('Overview VIP Callout')"
                                class="px-4 py-2 rounded-full bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-wider font-semibold cursor-pointer">
                            Register Here ↗
                        </button>
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
                    <span class="text-[#c5983e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Location &amp; Lifestyle</span>
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
            </div>
        </section>

        <!-- ═══════════ TAB 3: GALLERY ═══════════ -->
        <section x-show="currentTab === 'gallery'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white" style="display: none;">
            <div class="max-w-7xl mx-auto">
                <span class="text-[#c5983e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Visual Showcase</span>
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

        <!-- ═══════════ TAB 4: FLOOR PLANS (POPUP FORM TO UNLOCK) ═══════════ -->
        <section x-show="currentTab === 'floorplans'" class="px-6 lg:px-14 py-16 lg:py-20 bg-white" style="display: none;">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-10">
                    <div>
                        <span class="text-[#c5983e] uppercase tracking-[0.25em] text-xs font-semibold block mb-2">Bespoke Layouts</span>
                        <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 mb-2">Lot Collections &amp; Floor Plans</h2>
                        <p class="text-sm font-light text-gray-600">Explore signature architectural elevations and builder layouts for {{ $property->title }}.</p>
                    </div>
                    <button type="button"
                            @click="openUnlockModal('Complete Floor Plan Package')"
                            class="px-6 py-3 rounded-full bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold transition-colors cursor-pointer shrink-0">
                        Unlock All Floor Plans ↗
                    </button>
                </div>

                @if($property->floorPlans->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($property->floorPlans as $plan)
                            <div class="border border-gray-200 rounded-xl p-6 bg-white hover:border-[#c5983e] transition-colors flex flex-col shadow-sm group">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#c5983e]">{{ $plan->lot_collection }}</span>
                                    <span class="text-[11px] text-gray-400">Elevation {{ $plan->elevation }}</span>
                                </div>
                                <h3 class="font-fragment text-2xl uppercase tracking-wide text-gray-900 mb-2">{{ $plan->name }}</h3>
                                <p class="text-xs font-light text-gray-500 leading-relaxed mb-6">{{ $plan->description }}</p>

                                <!-- Schematic with Unlock Overlay -->
                                <div class="relative aspect-[4/3] bg-[#fdfaf4] border border-dashed border-gray-200 rounded-lg flex flex-col items-center justify-center p-4 mb-6 overflow-hidden">
                                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-widest">Architectural Schematic Locked</span>
                                    
                                    <div class="absolute inset-0 bg-white/70 backdrop-blur-[2px] flex items-center justify-center p-4 text-center group-hover:bg-white/80 transition-all">
                                        <button type="button"
                                                @click="openUnlockModal('{{ addslashes($plan->name) }}')"
                                                class="px-4 py-2 bg-[#0b2112] hover:bg-[#c5983e] text-white text-[11px] uppercase tracking-wider font-semibold rounded shadow-md transition-colors cursor-pointer">
                                            Unlock This Floor Plan ↗
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between text-xs text-gray-700 border-t border-gray-100 pt-4 mb-6">
                                    <span>{{ $plan->beds }} Beds</span>
                                    <span>&bull;</span>
                                    <span>{{ $plan->baths }} Baths</span>
                                    <span>&bull;</span>
                                    <span>{{ number_format($plan->sqft) }} Sq.Ft</span>
                                </div>

                                <button type="button"
                                        @click="openUnlockModal('{{ addslashes($plan->name) }}')"
                                        class="w-full py-3 rounded-lg border border-[#0b2112] text-[#0b2112] hover:bg-[#0b2112] hover:text-white transition-colors text-xs font-semibold uppercase tracking-wider text-center cursor-pointer">
                                    Unlock Floor Plan PDF ↗
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-12 text-center bg-[#fdfaf4] rounded-2xl border border-gray-200">
                        <p class="font-fragment text-xl text-gray-800 uppercase mb-2">Floor Plans Available Upon VIP Request</p>
                        <p class="text-xs text-gray-500 font-light mb-6">Register your interest to receive detailed elevations, lot availability, and architectural drawings.</p>
                        <button type="button"
                                @click="openUnlockModal('Full Architectural Package')"
                                class="px-8 py-3.5 rounded-full bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold shadow-md transition-colors cursor-pointer">
                            Unlock Floor Plan Package ↗
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <!-- ═══════════ DEDICATED POP UP FORM TO UNLOCK FLOOR PLANS ═══════════ -->
        <div x-show="unlockModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
             style="display: none;"
             @keydown.escape.window="unlockModalOpen = false">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-[#06130d]/80 backdrop-blur-md transition-opacity"
                 @click="unlockModalOpen = false"></div>

            <!-- Modal Content -->
            <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl p-6 sm:p-10 z-10 border border-gray-100 overflow-hidden transform transition-all">
                
                <button type="button"
                        @click="unlockModalOpen = false"
                        class="absolute top-5 right-5 text-gray-400 hover:text-gray-900 transition-colors p-1"
                        aria-label="Close modal">
                    ✕
                </button>

                <template x-if="!unlockSubmitted">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#c5983e]"></span>
                            <span class="text-[10px] uppercase tracking-[0.24em] font-semibold text-[#c5983e]">
                                Instant VIP Access
                            </span>
                        </div>
                        <h3 class="font-fragment text-2xl sm:text-3xl uppercase tracking-[0.04em] text-gray-900 mb-2">
                            Unlock Floor Plans &amp; Full Access
                        </h3>
                        <p class="text-xs text-gray-500 font-light leading-relaxed mb-6">
                            Enter your details below to instantly unlock architectural layouts, lot release schedules, and developer incentives for <strong class="text-gray-800">{{ $property->title }}</strong>.
                        </p>

                        <form @submit.prevent="submitUnlockForm()" class="space-y-4">
                            <div>
                                <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Full Name *</label>
                                <input type="text"
                                       x-model="unlockName"
                                       required
                                       placeholder="Your Full Name"
                                       class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-800 focus:outline-none focus:border-[#c5983e] focus:bg-white transition-colors" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Email Address *</label>
                                    <input type="email"
                                           x-model="unlockEmail"
                                           required
                                           placeholder="name@domain.com"
                                           class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-800 focus:outline-none focus:border-[#c5983e] focus:bg-white transition-colors" />
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Phone Number *</label>
                                    <input type="tel"
                                           x-model="unlockPhone"
                                           required
                                           placeholder="+1 (---) --- ----"
                                           class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-800 focus:outline-none focus:border-[#c5983e] focus:bg-white transition-colors" />
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                        :disabled="unlockLoading"
                                        class="w-full py-3.5 rounded-lg bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold transition-colors shadow-md cursor-pointer flex items-center justify-center gap-2">
                                    <span x-show="!unlockLoading">Unlock Floor Plans Now ↗</span>
                                    <span x-show="unlockLoading" style="display: none;">Connecting with Follow Up Boss VIP Desk...</span>
                                </button>
                            </div>

                            <p class="text-[10px] text-gray-400 text-center">
                                Direct VIP feed via Follow Up Boss CRM • No spam guaranteed.
                            </p>
                        </form>
                    </div>
                </template>

                <template x-if="unlockSubmitted">
                    <div class="text-center py-6 space-y-4">
                        <div class="w-14 h-14 mx-auto rounded-full bg-[#fdfaf4] border border-[#c5983e] text-[#c5983e] flex items-center justify-center text-xl">
                            ✓
                        </div>
                        <h4 class="font-fragment text-2xl uppercase tracking-wide text-gray-900">Floor Plans Unlocked</h4>
                        <p class="text-xs text-gray-500 font-light leading-relaxed max-w-sm mx-auto">
                            Thank you! Your VIP request for <strong class="text-gray-800">{{ $property->title }}</strong> has been confirmed. The floor plan package has been dispatched to your email and our client director will follow up shortly.
                        </p>
                        <button type="button"
                                @click="unlockModalOpen = false"
                                class="px-8 py-2.5 rounded-full border border-gray-300 text-xs uppercase tracking-wider font-semibold hover:border-gray-900 transition-colors cursor-pointer">
                            Close
                        </button>
                    </div>
                </template>

            </div>
        </div>

    </div>

</x-layouts.app>
