@forelse($properties as $index => $property)
    <x-precon-row :property="$property" :active="$index === 0" />
@empty
    <div class="p-12 text-center">
        <p class="font-fragment text-xl text-gray-800 uppercase mb-2">No Matching Communities</p>
        <p class="text-xs text-gray-500 font-light mb-6">Try adjusting your filters or search criteria.</p>
        <a href="{{ route('pre-construction') }}" class="btn-gold-outline text-xs">Reset All Filters</a>
    </div>
@endforelse
