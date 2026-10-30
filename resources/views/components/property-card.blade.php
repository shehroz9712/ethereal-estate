@props(['property'])

<div class="group flex flex-col bg-white border border-gray-200/90 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#c5983e]/60 hover:-translate-y-1 relative">
    <!-- Image Wrapper -->
    <a href="{{ route('properties.show', $property->slug) }}" class="relative aspect-[4/3] overflow-hidden bg-gray-100 block">
        <img src="{{ $property->primary_image_url }}"
             alt="{{ $property->title }}"
             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
             loading="lazy" />
        
        @if($property->price_label)
            <span class="absolute bottom-3 right-3 bg-[#06130d]/85 backdrop-blur-sm text-white text-[11px] font-semibold tracking-wider px-3 py-1 rounded">
                {{ $property->price_label }}
            </span>
        @endif
        
        @if($property->status === 'selling_fast')
            <span class="absolute top-3 left-3 bg-[#c5983e] text-white text-[9px] font-bold uppercase tracking-[0.16em] px-2.5 py-1 rounded shadow-sm">
                Selling Fast
            </span>
        @elseif($property->status === 'upcoming')
            <span class="absolute top-3 left-3 bg-[#1a2e1e] text-white text-[9px] font-bold uppercase tracking-[0.16em] px-2.5 py-1 rounded shadow-sm">
                Coming Soon
            </span>
        @endif
    </a>

    <!-- Wishlist Button Top Right -->
    <div class="absolute top-3 right-3 z-10">
        <button type="button"
                @click.stop="toggleSaveProperty({ id: {{ $property->id }}, title: '{{ addslashes($property->title) }}', city: '{{ addslashes($property->city) }}', price: '{{ addslashes($property->formatted_price) }}', image: '{{ $property->primary_image_url }}', url: '{{ route('properties.show', $property->slug) }}' })"
                class="w-7 h-7 rounded-full bg-black/50 hover:bg-black/80 backdrop-blur-md flex items-center justify-center text-white transition-colors cursor-pointer text-xs shadow-md"
                title="Save Property to Wishlist">
            <span :class="isPropertySaved({{ $property->id }}) ? 'text-red-400' : 'text-white'"
                  x-text="isPropertySaved({{ $property->id }}) ? '♥' : '♡'">
            </span>
        </button>
    </div>

    <!-- Body -->
    <div class="p-5 flex flex-col flex-1">
        <p class="text-[10px] font-semibold tracking-[0.22em] uppercase text-gray-400 mb-1">
            {{ $property->city }}
        </p>

        <h2 class="font-fragment text-xl sm:text-[1.35rem] uppercase tracking-[0.04em] text-gray-900 group-hover:text-[#c5983e] transition-colors leading-tight mb-2">
            <a href="{{ route('properties.show', $property->slug) }}">
                {{ $property->title }}
            </a>
        </h2>

        <p class="text-xs text-gray-500 font-light leading-relaxed mb-4 line-clamp-2">
            {{ $property->short_description ?? $property->feature_line }}
        </p>

        <!-- Specifications / Amenities Bar -->
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 border-t border-gray-100 pt-3.5 mt-auto text-[11.5px] text-gray-600">
            <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 9.5V17h18V9.5M3 13h18M7 9.5V8a1 1 0 011-1h8a1 1 0 011 1v1.5"/>
                </svg>
                {{ $property->bedrooms }} Bed
            </span>
            <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 12h16v3a4 4 0 01-4 4H8a4 4 0 01-4-4v-3zm0 0V7a2 2 0 012-2h2v3"/>
                </svg>
                {{ (int)$property->bathrooms }} Bath
            </span>
            <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="2" y="8" width="20" height="13" rx="1" stroke-width="1.6"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2 11h20M9 21v-4h6v4"/>
                </svg>
                {{ $property->garage }} Garage
            </span>
            <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="1" stroke-width="1.6"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 8h18M8 3v18"/>
                </svg>
                {{ number_format($property->sqft) }} Sq.Ft
            </span>
        </div>
    </div>
</div>
