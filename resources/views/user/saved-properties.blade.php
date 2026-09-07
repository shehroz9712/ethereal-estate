<x-user-layout title="My Saved Properties">
    <div class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-gray-200">
            <div>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                    Saved Developments &amp; Homes
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                    Your personal portfolio of bookmarked properties across Ontario.
                </p>
            </div>
            <div class="text-xs text-gray-500 font-medium">
                {{ $savedProperties->total() }} Properties Saved
            </div>
        </div>

        @if($savedProperties->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($savedProperties as $property)
                    <div class="bg-white border border-gray-200/80 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
                        
                        <!-- Image & Badge -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100 group">
                            <img src="{{ $property->primary_image_url }}"
                                 onerror="this.src='{{ asset('assets/images/prop-1.jpg') }}'"
                                 alt="{{ $property->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="bg-[#06130d]/85 backdrop-blur-sm text-[#d5a94e] text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded">
                                    {{ $property->property_type }}
                                </span>
                                @if($property->is_preconstruction)
                                    <span class="bg-[#1a2e1e]/90 text-white text-[10px] uppercase font-bold tracking-wider px-2 py-1 rounded">
                                        Pre-Con
                                    </span>
                                @endif
                            </div>

                            <!-- Unsave Button -->
                            <form action="{{ route('properties.favorite', $property->id) }}" method="POST" class="absolute top-3 right-3 z-10">
                                @csrf
                                <button type="submit" title="Remove from shortlist"
                                        class="w-8 h-8 rounded-full bg-white/90 text-red-500 hover:bg-white hover:text-red-700 flex items-center justify-center shadow-md transition-colors cursor-pointer">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <p class="text-sm font-semibold text-[#d5a94e] mb-1.5">
                                    {{ $property->formatted_price }}
                                </p>
                                <h3 class="font-fragment text-lg uppercase tracking-wide text-gray-900 line-clamp-1 hover:text-[#d5a94e] transition-colors">
                                    <a href="{{ route('properties.show', $property->slug) }}">
                                        {{ $property->title }}
                                    </a>
                                </h3>
                                <p class="text-xs text-gray-500 font-light mt-1 mb-4">
                                    {{ $property->address ? $property->address . ', ' : '' }}{{ $property->city }}, {{ $property->province }}
                                </p>

                                <div class="flex items-center gap-4 text-xs text-gray-600 pt-3 border-t border-gray-100">
                                    <span>{{ $property->bedrooms }} Beds</span>
                                    <span>•</span>
                                    <span>{{ $property->bathrooms }} Baths</span>
                                    @if($property->square_feet)
                                        <span>•</span>
                                        <span>{{ number_format($property->square_feet) }} Sq.Ft</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between gap-3">
                                <a href="{{ route('properties.show', $property->slug) }}"
                                   class="flex-1 text-center py-2 px-3 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded text-xs font-semibold uppercase tracking-wider transition-colors">
                                    View Details
                                </a>
                                <a href="{{ route('contact') }}?property={{ urlencode($property->title) }}"
                                   class="py-2 px-3 border border-gray-200 hover:border-[#d5a94e] text-xs font-semibold text-gray-700 rounded transition-colors text-center"
                                   title="Inquire">
                                    Inquire
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            @if($savedProperties->hasPages())
                <div class="pt-6 border-t border-gray-200 flex justify-center">
                    {{ $savedProperties->links() }}
                </div>
            @endif

        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="w-14 h-14 rounded-full bg-[#d5a94e]/10 text-[#d5a94e] flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-fragment text-xl uppercase text-gray-900 mb-2">No Saved Properties</h3>
                <p class="text-xs sm:text-sm text-gray-500 font-light max-w-sm mx-auto mb-6">
                    Bookmark your favorite pre-construction communities and luxury homes to compare them here.
                </p>
                <div class="flex justify-center gap-3">
                    <a href="{{ route('pre-construction') }}" class="px-5 py-2.5 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white text-xs uppercase tracking-wider font-semibold rounded transition-colors">
                        Explore Pre-Construction
                    </a>
                    <a href="{{ route('properties.index') }}" class="px-5 py-2.5 border border-gray-300 hover:border-gray-900 text-gray-800 text-xs uppercase tracking-wider font-semibold rounded transition-colors">
                        Browse MLS &amp; Featured
                    </a>
                </div>
            </div>
        @endif

    </div>
</x-user-layout>
