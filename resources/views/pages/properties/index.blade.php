<x-layouts.app activePage="properties" title="Distinctive Homes Across Ontario — Ethereal Estates">

    <!-- ═══════════ PAGE HEADER ═══════════ -->
    <div class="bg-white border-b border-gray-100 py-6 px-6 sm:px-10 lg:px-16">
        <div class="max-w-7xl mx-auto">
            <!-- Back Link -->
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-1.5 text-[11px] uppercase tracking-[0.14em] text-gray-400 hover:text-[#d5a94e] transition-colors mb-4">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M5 12l7-7M5 12l7 7"/>
                </svg>
                Back
            </a>

            <!-- Title Row + Pagination -->
            <div class="flex flex-col md:flex-row md:items-baseline justify-between gap-4">
                <h1 class="font-fragment text-2xl sm:text-3xl lg:text-4xl font-normal uppercase tracking-[0.05em] text-gray-900 leading-tight">
                    Distinctive Homes. Considered Choices.
                </h1>

                <!-- Pagination indicator pills -->
                <div class="flex items-center gap-1 shrink-0 text-xs text-gray-400">
                    <span>Showing {{ $properties->firstItem() ?? 0 }}-{{ $properties->lastItem() ?? 0 }} of {{ $properties->total() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════ FILTER & SEARCH BAR ═══════════ -->
    <div class="bg-[#fdfaf4] border-b border-gray-200/80 px-6 sm:px-10 lg:px-16 py-4">
        <div class="max-w-7xl mx-auto">
            <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 text-xs">
                <!-- Search Input -->
                <div class="col-span-2 sm:col-span-3 lg:col-span-2">
                    <input type="text"
                           name="search"
                           value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search by community or address..."
                           class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                </div>

                <!-- City -->
                <div>
                    <select name="city"
                            onchange="this.form.submit()"
                            class="w-full px-3 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-700 uppercase tracking-wider">
                        <option value="">All Cities</option>
                        <option value="Bowmanville" {{ ($filters['city'] ?? '') === 'Bowmanville' ? 'selected' : '' }}>Bowmanville</option>
                        <option value="Oshawa" {{ ($filters['city'] ?? '') === 'Oshawa' ? 'selected' : '' }}>Oshawa</option>
                        <option value="Whitby" {{ ($filters['city'] ?? '') === 'Whitby' ? 'selected' : '' }}>Whitby</option>
                        <option value="Ajax" {{ ($filters['city'] ?? '') === 'Ajax' ? 'selected' : '' }}>Ajax</option>
                        <option value="Aurora" {{ ($filters['city'] ?? '') === 'Aurora' ? 'selected' : '' }}>Aurora</option>
                        <option value="King City" {{ ($filters['city'] ?? '') === 'King City' ? 'selected' : '' }}>King City</option>
                    </select>
                </div>

                <!-- Bedrooms -->
                <div>
                    <select name="bedrooms"
                            onchange="this.form.submit()"
                            class="w-full px-3 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-700 uppercase tracking-wider">
                        <option value="">Bedrooms</option>
                        <option value="2+" {{ ($filters['bedrooms'] ?? '') === '2+' ? 'selected' : '' }}>2+ Beds</option>
                        <option value="3+" {{ ($filters['bedrooms'] ?? '') === '3+' ? 'selected' : '' }}>3+ Beds</option>
                        <option value="4+" {{ ($filters['bedrooms'] ?? '') === '4+' ? 'selected' : '' }}>4+ Beds</option>
                        <option value="5+" {{ ($filters['bedrooms'] ?? '') === '5+' ? 'selected' : '' }}>5+ Beds</option>
                    </select>
                </div>

                <!-- Property Type -->
                <div>
                    <select name="type"
                            onchange="this.form.submit()"
                            class="w-full px-3 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-700 uppercase tracking-wider">
                        <option value="">Property Type</option>
                        <option value="Single Detached" {{ ($filters['type'] ?? '') === 'Single Detached' ? 'selected' : '' }}>Single Detached</option>
                        <option value="Townhome" {{ ($filters['type'] ?? '') === 'Townhome' ? 'selected' : '' }}>Townhome</option>
                        <option value="Bungalow" {{ ($filters['type'] ?? '') === 'Bungalow' ? 'selected' : '' }}>Bungalow</option>
                    </select>
                </div>

                <!-- Submit / Reset -->
                <div class="flex items-center gap-2">
                    <button type="submit" class="w-full btn-gold !py-2.5 text-xs justify-center cursor-pointer">
                        Filter
                    </button>
                    @if(array_filter($filters))
                        <a href="{{ route('properties.index') }}" class="p-2.5 text-gray-400 hover:text-red-600 transition-colors" title="Reset Filters">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- ═══════════ CARDS GRID ═══════════ -->
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-12 lg:py-16">
        @if($properties->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($properties as $prop)
                    <x-property-card :property="$prop" />
                @endforeach
            </div>

            <!-- Bottom Pagination -->
            <div class="mt-14 flex items-center justify-center">
                {{ $properties->appends($filters)->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-[#fdfaf4] rounded-2xl border border-dashed border-gray-200">
                <p class="font-fragment text-2xl uppercase text-gray-800 mb-2">No Properties Found</p>
                <p class="text-xs text-gray-500 font-light max-w-md mx-auto mb-6">
                    We could not find any properties matching your current filter criteria.
                </p>
                <a href="{{ route('properties.index') }}" class="btn-gold-outline text-xs">Reset All Filters</a>
            </div>
        @endif
    </div>

</x-layouts.app>
