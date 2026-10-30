<!-- ═══════════ GLOBAL QUICK SEARCH MODAL ═══════════ -->
<div x-show="searchModalOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-start justify-center pt-20 px-4 sm:px-6"
     style="display: none;"
     @keydown.escape.window="searchModalOpen = false">

    <!-- Backdrop -->
    <div class="fixed inset-0 bg-[#06130d]/80 backdrop-blur-md transition-opacity"
         @click="searchModalOpen = false"></div>

    <!-- Search Modal Box -->
    <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 z-10"
         @click.outside="searchModalOpen = false">
        
        <form action="{{ route('pre-construction') }}" method="GET" class="p-4 sm:p-6 border-b border-gray-100">
            <div class="relative flex items-center">
                <svg class="w-5 h-5 text-gray-400 absolute left-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text"
                       name="search"
                       x-ref="globalSearchInput"
                       placeholder="Search by city, town, postal code or area..."
                       class="w-full h-14 pl-12 pr-12 text-sm sm:text-base text-gray-900 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#c5983e] focus:bg-white transition-colors" />
                <button type="submit"
                        class="absolute right-3 px-4 py-2 bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold rounded-lg transition-colors cursor-pointer">
                    Search
                </button>
            </div>

            <!-- Quick Suggestions / Popular Areas -->
            <div class="flex flex-wrap items-center gap-2 pt-4">
                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Popular Areas:</span>
                @foreach (['Bowmanville', 'Oshawa', 'Whitby', 'Ajax', 'King City', 'Richmond Hill'] as $area)
                    <a href="{{ route('pre-construction', ['search' => $area]) }}"
                       class="text-[11px] px-2.5 py-1 rounded bg-gray-100 hover:bg-[#c5983e]/20 text-gray-700 hover:text-[#0b2112] transition-colors">
                        {{ $area }}
                    </a>
                @endforeach
            </div>
        </form>

        <!-- Quick Jump Links -->
        <div class="p-4 sm:p-6 bg-[#faf9f6] flex items-center justify-between text-xs text-gray-500">
            <div class="flex items-center gap-4">
                <a href="{{ route('pre-construction') }}" class="hover:text-[#c5983e] transition-colors font-medium">Pre-Construction Collection →</a>
                <span>•</span>
                <a href="{{ route('properties.index') }}" class="hover:text-[#c5983e] transition-colors font-medium">Featured Listings →</a>
            </div>
            <button type="button" @click="searchModalOpen = false" class="text-gray-400 hover:text-gray-700 text-xs">
                Esc to close
            </button>
        </div>

    </div>
</div>
