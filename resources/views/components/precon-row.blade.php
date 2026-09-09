@props(['property', 'active' => false])

@php
    $images = $property->images->pluck('full_url')->toArray();
    if (empty($images)) {
        $images = [$property->primary_image_url];
    }
    $subtitle = $property->short_description ?? 'Bungalows and Single Detached Homes with 2 & 3-Car Garages';
@endphp

<div class="precon-item border border-[#e8e8e6] bg-[#fbfbfa] hover:bg-[#f6f5f0] transition-all duration-200 cursor-pointer mb-3 rounded-[3px] overflow-hidden shadow-[0_1px_2px_rgba(0,0,0,0.02)] {{ $active ? '!bg-[#fdfaf4] ring-1 ring-[#d5a94e]/70' : '' }}"
     id="prop-row-{{ $property->id }}"
     data-id="{{ $property->id }}"
     data-title="{{ $property->title }}"
     onclick="selectPreconListing({{ $property->id }})">

    <div class="grid grid-cols-[1fr_150px] sm:grid-cols-[1fr_170px] min-h-[125px]">
        <!-- Left Text & Info (exact Figma match) -->
        <div class="px-5 py-3.5 flex flex-col justify-center">
            <p class="text-[10px] sm:text-[10.5px] font-semibold tracking-[0.2em] uppercase text-[#333] mb-1 font-sans">
                {{ $property->city }}
            </p>

            <h3 class="font-fragment text-xl sm:text-[23px] uppercase tracking-[0.04em] text-[#111111] leading-tight mb-2 hover:text-[#d5a94e] transition-colors">
                <a href="{{ route('properties.show', $property->slug) }}" onclick="event.stopPropagation()">
                    {{ $property->title }}
                </a>
            </h3>

            <!-- Feature Subtitle line (exact from Figma) -->
            <p class="text-[11px] sm:text-[11.5px] text-[#444] font-normal leading-snug font-sans max-w-[260px]">
                {{ $subtitle }}
            </p>
        </div>

        <!-- Right Image Thumbnail with Carousel Dots (exact from Figma) -->
        <div class="relative w-[150px] sm:w-[170px] bg-gray-200 overflow-hidden shrink-0 group select-none">
            <img src="{{ $property->primary_image_url }}"
                 alt="{{ $property->title }}"
                 class="w-full h-full object-cover shrink-0 min-h-[125px]"
                 loading="lazy" />

            <!-- Dots Overlay matching screenshot: ⭘ • • • -->
            <div class="absolute bottom-2.5 inset-x-0 flex items-center justify-center gap-1.5 z-10 pointer-events-none">
                <span class="w-3.5 h-3.5 rounded-full border border-white flex items-center justify-center">
                    <span class="w-1 h-1 rounded-full bg-[#d5a94e]"></span>
                </span>
                <span class="w-1 h-1 rounded-full bg-white/80"></span>
                <span class="w-1 h-1 rounded-full bg-white/80"></span>
                <span class="w-1 h-1 rounded-full bg-white/80"></span>
            </div>
        </div>
    </div>
</div>
