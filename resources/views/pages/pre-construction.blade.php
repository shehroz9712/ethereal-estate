<x-layouts.app :hideFooter="true" activePage="pre-construction" title="Pre-Construction Communities — Ethereal Estates">

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
        #precon-wrap {
            height: calc(100dvh - 65px);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        #precon-scroll::-webkit-scrollbar {
            width: 3px;
        }
        #precon-scroll::-webkit-scrollbar-thumb {
            background: #d5a94e88;
            border-radius: 2px;
        }
    </style>
    @endpush

    <div id="precon-wrap">

        <!-- ═══════════ PAGE HEADER ═══════════ -->
        <div class="bg-white border-b border-gray-200 shrink-0 px-6 lg:px-12 py-3.5">
            <div class="flex items-center justify-between relative">
                <!-- Left: Back link -->
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-[0.14em] text-gray-400 hover:text-[#d5a94e] transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M5 12l7-7M5 12l7 7"/>
                    </svg>
                    Back
                </a>

                <!-- Centre: Page Title (HOMES WORTH THE WAIT. per brief) -->
                <h1 class="font-fragment text-xl sm:text-2xl md:text-3xl font-normal uppercase tracking-[0.06em] text-gray-900 text-center mx-auto absolute left-1/2 -translate-x-1/2">
                    Homes Worth The Wait.
                </h1>

                <!-- Right: Active Counter -->
                <div class="text-[11px] uppercase tracking-[0.18em] font-semibold text-[#d5a94e] whitespace-nowrap">
                    {{ $properties->count() }} Communities
                </div>
            </div>
        </div>

        <!-- ═══════════ FILTER BAR ═══════════ -->
        <form method="GET" action="{{ route('pre-construction') }}"
              id="filter-form"
              class="bg-white border-b border-gray-200 shrink-0 flex items-stretch overflow-x-auto text-xs">
            
            <!-- Search Input -->
            <div class="flex-1 min-w-[200px] border-r border-gray-200 px-6 flex items-center">
                <svg class="w-3.5 h-3.5 text-gray-400 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text"
                       name="search"
                       value="{{ $filters['search'] ?? '' }}"
                       placeholder="Search by community name, city or area..."
                       class="w-full py-2.5 bg-transparent border-none outline-none text-xs text-gray-700 placeholder-gray-400"
                       onchange="document.getElementById('filter-form').submit()" />
            </div>

            <!-- Max Price -->
            <div class="border-r border-gray-200 shrink-0">
                <select name="max_price"
                        onchange="document.getElementById('filter-form').submit()"
                        class="h-full px-4 py-2.5 bg-white border-none outline-none cursor-pointer uppercase tracking-wider text-[11px] font-medium text-gray-600">
                    <option value="">Max Price</option>
                    <option value="$500K" {{ ($filters['max_price'] ?? '') === '$500K' ? 'selected' : '' }}>Under $500K</option>
                    <option value="$750K" {{ ($filters['max_price'] ?? '') === '$750K' ? 'selected' : '' }}>Under $750K</option>
                    <option value="$1M" {{ ($filters['max_price'] ?? '') === '$1M' ? 'selected' : '' }}>Under $1M</option>
                    <option value="$2M+" {{ ($filters['max_price'] ?? '') === '$2M+' ? 'selected' : '' }}>$2M+</option>
                </select>
            </div>

            <!-- Bedrooms -->
            <div class="border-r border-gray-200 shrink-0">
                <select name="bedrooms"
                        onchange="document.getElementById('filter-form').submit()"
                        class="h-full px-4 py-2.5 bg-white border-none outline-none cursor-pointer uppercase tracking-wider text-[11px] font-medium text-gray-600">
                    <option value="">Bedrooms</option>
                    <option value="2+" {{ ($filters['bedrooms'] ?? '') === '2+' ? 'selected' : '' }}>2+ Bedrooms</option>
                    <option value="3+" {{ ($filters['bedrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ Bedrooms</option>
                    <option value="4+" {{ ($filters['bedrooms'] ?? '') === '4+' ? 'selected' : '' }}>4+ Bedrooms</option>
                    <option value="5+" {{ ($filters['bedrooms'] ?? '') === '5+' ? 'selected' : '' }}>5+ Bedrooms</option>
                </select>
            </div>

            <!-- Bathrooms -->
            <div class="border-r border-gray-200 shrink-0">
                <select name="bathrooms"
                        onchange="document.getElementById('filter-form').submit()"
                        class="h-full px-4 py-2.5 bg-white border-none outline-none cursor-pointer uppercase tracking-wider text-[11px] font-medium text-gray-600">
                    <option value="">Bathrooms</option>
                    <option value="2+" {{ ($filters['bathrooms'] ?? '') === '2+' ? 'selected' : '' }}>2+ Bathrooms</option>
                    <option value="3+" {{ ($filters['bathrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ Bathrooms</option>
                    <option value="4+" {{ ($filters['bathrooms'] ?? '') === '4+' ? 'selected' : '' }}>4+ Bathrooms</option>
                </select>
            </div>

            <!-- Property Type -->
            <div class="border-r border-gray-200 shrink-0">
                <select name="type"
                        onchange="document.getElementById('filter-form').submit()"
                        class="h-full px-4 py-2.5 bg-white border-none outline-none cursor-pointer uppercase tracking-wider text-[11px] font-medium text-gray-600">
                    <option value="">Property Type</option>
                    <option value="Single Detached" {{ ($filters['type'] ?? '') === 'Single Detached' ? 'selected' : '' }}>Single Detached</option>
                    <option value="Townhome" {{ ($filters['type'] ?? '') === 'Townhome' ? 'selected' : '' }}>Townhome</option>
                    <option value="Bungalow" {{ ($filters['type'] ?? '') === 'Bungalow' ? 'selected' : '' }}>Bungalow</option>
                    <option value="Condo" {{ ($filters['type'] ?? '') === 'Condo' ? 'selected' : '' }}>Condo</option>
                </select>
            </div>

            @if(array_filter($filters))
                <div class="shrink-0 flex items-center px-4">
                    <a href="{{ route('pre-construction') }}" class="text-[10px] uppercase tracking-wider text-red-600 hover:underline">
                        Clear Filters
                    </a>
                </div>
            @endif
        </form>

        <!-- ═══════════ SPLIT VIEW: 40% LISTINGS | 60% MAP ═══════════ -->
        <div class="flex-1 flex min-h-0 overflow-hidden relative">

            <!-- LEFT 40% SCROLLABLE LISTINGS -->
            <div class="w-full md:w-[45%] lg:w-[40%] xl:w-[38%] shrink-0 flex flex-col border-r border-gray-200 bg-white relative">
                <!-- Gold Accent Bar on Far Left (per Figma) -->
                <div class="absolute left-0 top-0 bottom-0 w-[3px] bg-[#d5a94e] z-10"></div>

                <!-- Listings Scroll Container -->
                <div id="precon-scroll" class="flex-1 min-h-0 overflow-y-auto overflow-x-hidden pl-[3px]">
                    <x-precon-list-partial :properties="$properties" />
                </div>
            </div>

            <!-- RIGHT 60% FULLSCREEN INTERACTIVE MAP -->
            <div class="hidden md:block flex-1 relative min-w-0 bg-gray-100">
                <div id="precon-map" class="absolute inset-0 w-full h-full"></div>
            </div>

        </div>

    </div>

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const MAP_MARKERS = @json($mapMarkers);

        let map, leafletMarkers = {};

        document.addEventListener('DOMContentLoaded', function() {
            // Default center around Durham / GTA Ontario
            const defaultCenter = MAP_MARKERS.length > 0
                ? [MAP_MARKERS[0].lat, MAP_MARKERS[0].lng]
                : [43.9043, -78.6873];

            map = L.map('precon-map', {
                center: defaultCenter,
                zoom: 11,
                zoomControl: true
            });

            // Clean CartoDB Positron luxury map tile layer
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap &copy; CARTO',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);

            function createCustomPin(title, isActive = false) {
                const bg = isActive ? '#d5a94e' : '#06130d';
                const border = isActive ? '#06130d' : '#d5a94e';
                const textColor = isActive ? '#06130d' : '#ffffff';

                return L.divIcon({
                    className: 'custom-leaflet-pin',
                    iconSize: [36, 44],
                    iconAnchor: [18, 44],
                    popupAnchor: [0, -46],
                    html: `
                        <div class="leaf-pin ${isActive ? 'active' : ''}">
                            <div class="leaf-pin-head" style="background: ${bg}; border-color: ${border}; color: ${textColor};">
                                TH
                            </div>
                            <div class="leaf-pin-tail" style="background: ${bg};"></div>
                        </div>
                    `
                });
            }

            // Populate Map Markers
            MAP_MARKERS.forEach((m, idx) => {
                const marker = L.marker([m.lat, m.lng], {
                    icon: createCustomPin(m.title, idx === 0)
                }).addTo(map);

                marker.bindPopup(`
                    <div style="padding: 12px 14px; min-width: 170px;">
                        <p style="font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: #888; margin: 0 0 3px;">${m.city}</p>
                        <h4 style="font-family: 'PP Fragment Serif Regular', Georgia, serif; font-size: 1.1rem; text-transform: uppercase; margin: 0 0 5px; color: #111;">${m.title}</h4>
                        <p style="font-size: 11px; font-weight: 600; color: #d5a94e; margin: 0 0 8px;">${m.price}</p>
                        <a href="${m.url}" style="display: inline-block; font-size: 10px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 700; color: #06130d; text-decoration: underline;">Explore Community ↗</a>
                    </div>
                `, { closeButton: false });

                marker.on('click', () => {
                    selectPreconListing(m.id, m.lat, m.lng, false);
                });

                leafletMarkers[m.id] = marker;
            });

            // Open initial popup if available
            if (MAP_MARKERS.length > 0) {
                setTimeout(() => {
                    leafletMarkers[MAP_MARKERS[0].id]?.openPopup();
                }, 600);
            }
        });

        function selectPreconListing(id, lat, lng, panMap = true) {
            // Update left column active state
            document.querySelectorAll('.precon-item').forEach(el => {
                el.classList.remove('bg-[#fdfaf4]');
                el.classList.add('bg-white');
            });

            const row = document.getElementById('prop-row-' + id);
            if (row) {
                row.classList.remove('bg-white');
                row.classList.add('bg-[#fdfaf4]');
                row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }

            // Update Map Pins & Fly to Coordinates
            if (map && leafletMarkers[id]) {
                Object.keys(leafletMarkers).forEach(k => {
                    const isActive = parseInt(k) === parseInt(id);
                    leafletMarkers[k].setIcon(L.divIcon({
                        className: 'custom-leaflet-pin',
                        iconSize: [36, 44],
                        iconAnchor: [18, 44],
                        popupAnchor: [0, -46],
                        html: `
                            <div class="leaf-pin ${isActive ? 'active' : ''}">
                                <div class="leaf-pin-head" style="background: ${isActive ? '#d5a94e' : '#06130d'}; border-color: ${isActive ? '#06130d' : '#d5a94e'}; color: ${isActive ? '#06130d' : '#ffffff'};">
                                    TH
                                </div>
                                <div class="leaf-pin-tail" style="background: ${isActive ? '#d5a94e' : '#06130d'};"></div>
                            </div>
                        `
                    }));
                });

                if (panMap) {
                    map.flyTo([lat, lng], 13, { duration: 0.7 });
                }
                leafletMarkers[id].openPopup();
            }
        }
    </script>
    @endpush

</x-layouts.app>
