@props(['property', 'active' => false])

@php
    $images = $property->images->pluck('full_url')->toArray();
    if (empty($images)) {
        $images = [$property->primary_image_url];
    }
@endphp

<div class="precon-item border-b border-gray-200/80 cursor-pointer transition-colors duration-150 {{ $active ? 'bg-[#fdfaf4]' : 'bg-white hover:bg-[#fdfaf4]' }}"
     id="prop-row-{{ $property->id }}"
     data-id="{{ $property->id }}"
     data-lat="{{ $property->latitude }}"
     data-lng="{{ $property->longitude }}"
     data-title="{{ $property->title }}"
     onclick="selectPreconListing({{ $property->id }}, {{ $property->latitude }}, {{ $property->longitude }})">

    <div class="grid grid-cols-[1fr_135px] sm:grid-cols-[1fr_150px] min-h-[125px]">
        <!-- Text & Specs Info -->
        <div class="p-4 sm:p-5 flex flex-col justify-center">
            <p class="text-[10px] font-semibold tracking-[0.2em] uppercase text-gray-400 mb-1">
                {{ $property->city }}
            </p>

            <h3 class="font-fragment text-xl sm:text-[1.3rem] uppercase tracking-[0.05em] text-gray-900 leading-tight mb-2">
                <a href="{{ route('properties.show', $property->slug) }}" class="hover:text-[#d5a94e] transition-colors" onclick="event.stopPropagation()">
                    {{ $property->title }}
                </a>
            </h3>

            <!-- Specifications: 4 BED · 6 BATH · 1,400 SQ FT -->
            <p class="text-[11px] font-medium tracking-wider text-gray-700 uppercase mb-1">
                {{ $property->bedrooms }} BED &middot; {{ (int)$property->bathrooms }} BATH &middot; {{ number_format($property->sqft) }} SQ FT
            </p>

            <!-- Property-specific feature line in italics -->
            @if($property->feature_line)
                <p class="text-xs text-gray-500 italic font-light line-clamp-1 mb-2">
                    {{ $property->feature_line }}
                </p>
            @endif

            <div class="flex items-center gap-4 mt-1">
                <a href="{{ route('properties.show', $property->slug) }}"
                   onclick="event.stopPropagation()"
                   class="inline-flex items-center gap-1.5 text-[10px] uppercase tracking-[0.16em] font-semibold text-[#d5a94e] hover:underline">
                    View Details ↗
                </a>
                <button type="button"
                        onclick="event.stopPropagation(); window.dispatchEvent(new CustomEvent('open-vip-modal', { detail: { id: {{ $property->id }}, title: '{{ addslashes($property->title) }}' } }))"
                        class="text-[10px] uppercase tracking-[0.16em] text-gray-400 hover:text-gray-900 transition-colors">
                    Request VIP Access
                </button>
            </div>
        </div>

        <!-- Image Slider Thumbnail -->
        <div class="relative w-[135px] sm:w-[150px] bg-gray-100 overflow-hidden shrink-0 group select-none"
             x-data="{ currentSlide: 0, total: {{ count($images) }} }"
             onclick="event.stopPropagation()">

            <!-- Slides Track -->
            <div class="flex h-full transition-transform duration-400 ease-out"
                 :style="`transform: translateX(-${currentSlide * 100}%);`">
                @foreach($images as $img)
                    <img src="{{ $img }}"
                         alt="{{ $property->title }}"
                         class="w-full h-full object-cover shrink-0 min-h-[125px]"
                         loading="lazy" />
                @endforeach
            </div>

            <!-- Dots Overlay -->
            @if(count($images) > 1)
                <div class="absolute bottom-2.5 inset-x-0 flex items-center justify-center gap-1.5 z-10">
                    <template x-for="(item, idx) in total" :key="idx">
                        <button type="button"
                                @click.stop="currentSlide = idx"
                                class="w-1.5 h-1.5 rounded-full transition-all duration-200"
                                :class="currentSlide === idx ? 'bg-white scale-125 ring-1 ring-white/60' : 'bg-white/50 hover:bg-white/80'"></button>
                    </template>
                </div>
            @endif
        </div>
    </div>
</div>
