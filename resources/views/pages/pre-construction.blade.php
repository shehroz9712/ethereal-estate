<x-layouts.app :hideFooter="true" activePage="pre-construction" title="Pre-Construction Communities — Ethereal Estates" bodyClass="overflow-hidden h-screen bg-white">

    @push('styles')
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
            background-color: #ffffff;
        }
        #precon-wrap {
            height: calc(100dvh - 65px);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        #precon-scroll::-webkit-scrollbar {
            width: 3.5px;
        }
        #precon-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        #precon-scroll::-webkit-scrollbar-thumb {
            background: #d5a94e80;
            border-radius: 3px;
        }

        /* Animated Pin Highlight */
        @keyframes pinPulse {
            0% { transform: scale(1); opacity: 0.9; }
            50% { transform: scale(1.35); opacity: 0.3; }
            100% { transform: scale(1.6); opacity: 0; }
        }
        .pin-glow-ring {
            animation: pinPulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>
    @endpush

    <div id="precon-wrap">

        <!-- ═══════════ SUBHEADER ROW (exact Figma match) ═══════════ -->
        <div class="bg-white shrink-0 px-6 sm:px-10 lg:px-14 py-3 border-b border-gray-100/90">
            <div class="relative flex items-center justify-between">
                
                <!-- Left: Back link + (Pre Construction) label -->
                <div class="flex flex-col items-start gap-0.5 z-10">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-[0.14em] text-gray-500 hover:text-[#d5a94e] transition-colors font-sans">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>
                    <span class="font-fragment italic text-xl sm:text-2xl text-[#b8860b] tracking-wide leading-tight select-none">
                        (Pre Construction)
                    </span>
                </div>

                <!-- Centre: Heading "WELCOME TO YOUR NEW HOME" (exact Figma) -->
                <h1 class="font-fragment text-xl sm:text-2xl md:text-3xl lg:text-[32px] uppercase tracking-[0.05em] text-[#111111] absolute left-1/2 -translate-x-1/2 text-center whitespace-nowrap leading-tight select-none font-normal">
                    Welcome to Your New Home
                </h1>

                <!-- Right: Spacer for visual balance -->
                <div class="w-28 hidden sm:block"></div>
            </div>
        </div>

        <!-- ═══════════ FILTER BAR (exact Figma individual rounded input cards) ═══════════ -->
        <div class="bg-white shrink-0 px-6 sm:px-10 lg:px-14 py-2.5 border-b border-gray-100">
            <form method="GET" action="{{ route('pre-construction') }}" id="filter-form"
                  class="flex items-center gap-2.5 overflow-x-auto select-none no-scrollbar">

                <!-- 1. Search by postcode or area... -->
                <div class="flex-[2] min-w-[200px] sm:min-w-[260px]">
                    <input type="text"
                           name="search"
                           value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search by postcode or area..."
                           class="w-full h-10 px-4 bg-white border border-gray-200 rounded-[4px] text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#d5a94e] transition-colors font-sans"
                           onchange="document.getElementById('filter-form').submit()" />
                </div>

                <!-- 2. Distance Miles -->
                <div class="min-w-[110px] shrink-0">
                    <select name="miles"
                            class="w-full h-10 px-3.5 bg-white border border-gray-200 rounded-[4px] text-[11px] font-medium uppercase tracking-wider text-gray-700 cursor-pointer focus:outline-none focus:border-[#d5a94e] font-sans">
                        <option value="30">30 MILES</option>
                        <option value="10">10 MILES</option>
                        <option value="20">20 MILES</option>
                        <option value="50">50 MILES</option>
                    </select>
                </div>

                <!-- 3. Max Price -->
                <div class="min-w-[125px] shrink-0">
                    <select name="max_price"
                            onchange="document.getElementById('filter-form').submit()"
                            class="w-full h-10 px-3.5 bg-white border border-gray-200 rounded-[4px] text-[11px] font-medium uppercase tracking-wider text-gray-700 cursor-pointer focus:outline-none focus:border-[#d5a94e] font-sans">
                        <option value="">MAX PRICE</option>
                        <option value="$500K" {{ ($filters['max_price'] ?? '') === '$500K' ? 'selected' : '' }}>UNDER $500K</option>
                        <option value="$750K" {{ ($filters['max_price'] ?? '') === '$750K' ? 'selected' : '' }}>UNDER $750K</option>
                        <option value="$1M" {{ ($filters['max_price'] ?? '') === '$1M' ? 'selected' : '' }}>UNDER $1M</option>
                        <option value="$2M+" {{ ($filters['max_price'] ?? '') === '$2M+' ? 'selected' : '' }}>$2M+</option>
                    </select>
                </div>

                <!-- 4. Bedrooms -->
                <div class="min-w-[125px] shrink-0">
                    <select name="bedrooms"
                            onchange="document.getElementById('filter-form').submit()"
                            class="w-full h-10 px-3.5 bg-white border border-gray-200 rounded-[4px] text-[11px] font-medium uppercase tracking-wider text-gray-700 cursor-pointer focus:outline-none focus:border-[#d5a94e] font-sans">
                        <option value="">BEDROOMS</option>
                        <option value="2+" {{ ($filters['bedrooms'] ?? '') === '2+' ? 'selected' : '' }}>2+ BEDROOMS</option>
                        <option value="3+" {{ ($filters['bedrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ BEDROOMS</option>
                        <option value="4+" {{ ($filters['bedrooms'] ?? '') === '4+' ? 'selected' : '' }}>4+ BEDROOMS</option>
                        <option value="5+" {{ ($filters['bedrooms'] ?? '') === '5+' ? 'selected' : '' }}>5+ BEDROOMS</option>
                    </select>
                </div>

                <!-- 5. Bathrooms -->
                <div class="min-w-[130px] shrink-0">
                    <select name="bathrooms"
                            onchange="document.getElementById('filter-form').submit()"
                            class="w-full h-10 px-3.5 bg-white border border-gray-200 rounded-[4px] text-[11px] font-medium uppercase tracking-wider text-gray-700 cursor-pointer focus:outline-none focus:border-[#d5a94e] font-sans">
                        <option value="">BATHROOMS</option>
                        <option value="1+" {{ ($filters['bathrooms'] ?? '') === '1+' ? 'selected' : '' }}>1+ BATHROOMS</option>
                        <option value="2+" {{ ($filters['bathrooms'] ?? '') === '2+' ? 'selected' : '' }}>2+ BATHROOMS</option>
                        <option value="3+" {{ ($filters['bathrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ BATHROOMS</option>
                        <option value="4+" {{ ($filters['bathrooms'] ?? '') === '4+' ? 'selected' : '' }}>4+ BATHROOMS</option>
                    </select>
                </div>

                <!-- 6. Property Type -->
                <div class="min-w-[145px] shrink-0">
                    <select name="type"
                            onchange="document.getElementById('filter-form').submit()"
                            class="w-full h-10 px-3.5 bg-white border border-gray-200 rounded-[4px] text-[11px] font-medium uppercase tracking-wider text-gray-700 cursor-pointer focus:outline-none focus:border-[#d5a94e] font-sans">
                        <option value="">PROPERTY TYPE</option>
                        <option value="Detached" {{ ($filters['type'] ?? '') === 'Detached' ? 'selected' : '' }}>DETACHED</option>
                        <option value="Townhome" {{ ($filters['type'] ?? '') === 'Townhome' ? 'selected' : '' }}>TOWNHOME</option>
                        <option value="Condominium" {{ ($filters['type'] ?? '') === 'Condominium' ? 'selected' : '' }}>CONDOMINIUM</option>
                        <option value="Estate" {{ ($filters['type'] ?? '') === 'Estate' ? 'selected' : '' }}>ESTATE</option>
                    </select>
                </div>

                @if(array_filter($filters))
                    <div class="shrink-0 pl-2">
                        <a href="{{ route('pre-construction') }}" class="text-[11px] uppercase tracking-wider text-red-600 hover:underline font-semibold whitespace-nowrap">
                            Clear Filters ✕
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- ═══════════ MAIN SPLIT (EXACT 1:1 FIGMA SCREENSHOT LAYOUT) ═══════════ -->
        <div class="flex-1 min-h-0 flex overflow-hidden px-6 sm:px-10 lg:px-14 py-4 gap-6 bg-white">

            <!-- LEFT COLUMN: Listings with Far-Left Gold Line + Separator Line -->
            <div class="w-full md:w-[45%] lg:w-[41%] xl:w-[39%] shrink-0 flex items-stretch gap-4 min-h-0">
                
                <!-- Left Accent Line Container (exact Figma match) -->
                <div class="flex items-stretch shrink-0 gap-3.5 self-stretch my-1 mr-1 select-none">
                    <!-- Gold vertical accent line -->
                    <div class="w-[3.5px] bg-[#c5983e] shrink-0"></div>
                    <!-- Subtle grey vertical separator -->
                    <div class="w-[1px] bg-gray-200 shrink-0"></div>
                </div>

                <!-- Scrollable Cards Container -->
                <div id="precon-scroll" class="flex-1 min-h-0 overflow-y-auto pr-1">
                    <x-precon-list-partial :properties="$properties" />
                </div>
            </div>

            <!-- RIGHT COLUMN: Map Container with exact Figma Map (precon-map.jpg) & Interactive Hotspots -->
            <div class="hidden md:flex flex-1 min-w-0 min-h-0 rounded-[22px] lg:rounded-[26px] overflow-hidden shadow-[0_2px_14px_rgba(0,0,0,0.03)] border border-gray-200/80 relative bg-[#f5f6f3] select-none"
                 id="map-container">
                
                <!-- Base Figma Map Image (100% pixel identical to Figma screenshot) -->
                <img src="{{ asset('assets/images/precon-map.jpg') }}"
                     alt="Pre-Construction Ontario Map"
                     class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none" />

                <!-- Interactive Hotspots Overlay -->
                <div class="absolute inset-0 w-full h-full pointer-events-auto">

                    <!-- Hotspot 1: Orchard South (Big center-right pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 52%; top: 38%;"
                         id="pin-1"
                         onclick="selectPreconListing(1)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-14 h-16 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Hotspot 2: Chateau 9 (Upper-center pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 44.3%; top: 15%;"
                         id="pin-2"
                         onclick="selectPreconListing(2)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-10 h-12 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Hotspot 3: Ellia at Unity (Bottom-left prominent pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 16.1%; top: 78%;"
                         id="pin-3"
                         onclick="selectPreconListing(3)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-12 h-14 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Hotspot 4: Mirra Townhomes (Mid-center pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 33.4%; top: 51%;"
                         id="pin-4"
                         onclick="selectPreconListing(4)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-10 h-12 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Hotspot 5: Highland Reserve (Mid-right pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 74.8%; top: 55%;"
                         id="pin-5"
                         onclick="selectPreconListing(5)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-10 h-12 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Hotspot 6: Orchard West (Far-right pin in Figma) -->
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 cursor-pointer z-20 group"
                         style="left: 90.3%; top: 68%;"
                         id="pin-6"
                         onclick="selectPreconListing(6)">
                        <span class="pin-pulse-glow hidden absolute -inset-3 rounded-full bg-[#d5a94e]/30 pin-glow-ring"></span>
                        <div class="w-10 h-12 rounded-full hover:scale-110 transition-transform"></div>
                    </div>

                    <!-- Floating Property Detail Popup -->
                    <div id="map-popup"
                         class="absolute z-30 transition-all duration-300 ease-out bg-white rounded-xl shadow-2xl border border-gray-100 p-3.5 min-w-[210px] transform -translate-x-1/2 -translate-y-full"
                         style="left: 52%; top: 32%; display: block;">
                        <div class="relative">
                            <button type="button"
                                    onclick="closeMapPopup()"
                                    class="absolute -top-1.5 -right-1.5 text-gray-400 hover:text-gray-700 text-xs w-4 h-4 rounded-full flex items-center justify-center">✕</button>
                            <p id="pop-city" class="text-[9.5px] uppercase tracking-[0.2em] font-semibold text-gray-400 mb-0.5">BOWMANVILLE</p>
                            <h4 id="pop-title" class="font-fragment text-base uppercase text-[#111] leading-tight mb-1 font-medium">ORCHARD SOUTH</h4>
                            <p id="pop-price" class="text-xs font-semibold text-[#d5a94e] mb-2.5">From $1,250,000</p>
                            <a id="pop-link" href="{{ route('properties.show', 'orchard-south') }}"
                               class="inline-flex items-center gap-1 text-[10px] font-semibold uppercase tracking-wider text-[#0b2e1b] hover:text-[#d5a94e] transition-colors underline">
                                Explore Community ↗
                            </a>
                        </div>
                        <!-- Little arrow pointer -->
                        <div class="absolute top-full left-1/2 -translate-x-1/2 border-solid border-t-white border-t-8 border-x-transparent border-x-8 border-b-0 w-0 h-0"></div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    @push('scripts')
    <script>
        const PRECON_DATA = {
            1: { title: 'ORCHARD SOUTH', city: 'BOWMANVILLE', price: 'From $1,250,000', url: '{{ route('properties.show', 'orchard-south') }}', left: '52%', top: '38%' },
            2: { title: 'CHATEAU 9', city: 'BOWMANVILLE', price: 'From $1,450,000', url: '{{ route('properties.show', 'chateau-9') }}', left: '44.3%', top: '15%' },
            3: { title: 'ELLIA AT UNITY', city: 'BOWMANVILLE', price: 'From $998,000', url: '{{ route('properties.show', 'ellia-at-unity') }}', left: '16.1%', top: '78%' },
            4: { title: 'MIRRA TOWNHOMES', city: 'OSHAWA', price: 'From $849,000', url: '{{ route('properties.show', 'mirra-townhomes') }}', left: '33.4%', top: '51%' },
            5: { title: 'HIGHLAND RESERVE', city: 'WHITBY', price: 'From $1,190,000', url: '{{ route('properties.show', 'highland-reserve') }}', left: '74.8%', top: '55%' },
            6: { title: 'ORCHARD WEST', city: 'AJAX', price: 'From $1,050,000', url: '{{ route('properties.show', 'orchard-west') }}', left: '90.3%', top: '68%' }
        };

        function selectPreconListing(id) {
            // Update left column active card state
            document.querySelectorAll('.precon-item').forEach(el => {
                el.classList.remove('!bg-[#fdfaf4]', 'ring-1', 'ring-[#d5a94e]/70');
            });

            const row = document.getElementById('prop-row-' + id);
            if (row) {
                row.classList.add('!bg-[#fdfaf4]', 'ring-1', 'ring-[#d5a94e]/70');
                row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }

            // Update Map Pins Pulsing Highlight
            document.querySelectorAll('.pin-pulse-glow').forEach(el => el.classList.add('hidden'));
            const activePin = document.getElementById('pin-' + id);
            if (activePin) {
                const glow = activePin.querySelector('.pin-pulse-glow');
                if (glow) glow.classList.remove('hidden');
            }

            // Position and show detail popup
            const popup = document.getElementById('map-popup');
            const data = PRECON_DATA[id];
            if (popup && data) {
                document.getElementById('pop-title').innerText = data.title;
                document.getElementById('pop-city').innerText = data.city;
                document.getElementById('pop-price').innerText = data.price;
                document.getElementById('pop-link').href = data.url;

                popup.style.left = data.left;
                // Position popup slightly above the pin
                const topPercent = parseFloat(data.top);
                popup.style.top = (topPercent - 4) + '%';
                popup.style.display = 'block';
            }
        }

        function closeMapPopup() {
            const popup = document.getElementById('map-popup');
            if (popup) popup.style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Select first property by default (Orchard South)
            selectPreconListing(1);
        });
    </script>
    @endpush

</x-layouts.app>
