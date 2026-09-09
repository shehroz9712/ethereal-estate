<x-layouts.app :title="$article->title . ' — Ethereal Edit'" activePage="ethereal-edit">
    <!-- ARTICLE HEADER -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-14 py-8 sm:py-12">
            <div class="mb-6">
                <a href="{{ route('ethereal-edit') }}"
                   class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.14em] text-gray-500 hover:text-[#d5a94e] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Back to Ethereal Edit</span>
                </a>
            </div>

            <div class="flex items-center gap-3 text-xs text-[#d5a94e] font-semibold uppercase tracking-widest mb-3">
                <span>{{ $article->category ?? 'Real Estate Analysis' }}</span>
                <span>•</span>
                <time datetime="{{ $article->published_at?->toDateString() }}" class="text-gray-500 font-normal">
                    {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                </time>
                <span>•</span>
                <span class="text-gray-500 font-normal">4 min read</span>
            </div>

            <h1 class="font-fragment text-3xl sm:text-4xl lg:text-5xl text-gray-900 uppercase tracking-[0.04em] leading-tight max-w-4xl">
                {{ $article->title }}
            </h1>
        </div>
    </header>

    <!-- HERO IMAGE -->
    <div class="bg-[#fbfbf9] px-6 lg:px-14 py-8">
        <div class="max-w-7xl mx-auto">
            <div class="rounded-2xl overflow-hidden aspect-[21/9] max-h-[500px] w-full shadow-sm bg-gray-900">
                <img src="{{ $article->full_image_url }}"
                     onerror="this.src='{{ asset('assets/images/news-hero.jpg') }}'"
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover" />
            </div>
        </div>
    </div>

    <!-- MAIN BODY & SIDEBAR -->
    <section class="bg-[#fbfbf9] px-6 lg:px-14 pb-24">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-12 lg:gap-16 items-start">
            
            <!-- Article Content Column -->
            <div class="bg-white p-8 sm:p-12 rounded-2xl border border-gray-100 shadow-sm">
                <!-- Excerpt Lead -->
                @if($article->excerpt)
                    <div class="text-lg sm:text-xl font-light leading-relaxed text-gray-800 pb-8 mb-8 border-b border-gray-100 italic">
                        "{{ $article->excerpt }}"
                    </div>
                @endif

                <!-- Formatted HTML Content -->
                <div class="prose max-w-none text-gray-700 font-light leading-[1.8] space-y-6 text-[15px]">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Callout Quote -->
                <div class="my-10 p-6 rounded-xl bg-[#1a2e1e]/5 border-l-4 border-[#d5a94e]">
                    <p class="font-fragment text-base sm:text-lg text-gray-900 uppercase tracking-wide mb-2">
                        Strategic Advisory Note
                    </p>
                    <p class="text-xs sm:text-sm text-gray-600 font-light">
                        Pre-construction investments in high-growth Ontario corridors continue to benefit from prolonged deposit structures, developer incentives, and substantial population inflow. Speak with an Ethereal advisor before committing to an allocation.
                    </p>
                </div>

                <!-- Author Signature -->
                <div class="pt-10 mt-10 border-t border-gray-100 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#1a2e1e] text-[#d5a94e] font-serif font-bold text-lg flex items-center justify-center">
                            E
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $article->author_name ?? 'Nakul Sood & Ethereal Advisory Team' }}</p>
                            <p class="text-xs text-gray-500">Managing Advisory • Ethereal Estates Ontario</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Article link copied to clipboard!');"
                                class="px-3.5 py-2 border border-gray-200 hover:border-[#d5a94e] text-xs text-gray-700 rounded-md transition-colors flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                            <span>Share Article</span>
                        </button>
                    </div>
                </div>

                <!-- Prev / Next Navigation -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-10 pt-8 border-t border-gray-100">
                    @if($prevArticle)
                        <a href="{{ route('ethereal-edit.show', $prevArticle->slug) }}"
                           class="p-4 rounded-xl border border-gray-100 hover:border-[#d5a94e] transition-colors group block">
                            <span class="text-[10px] uppercase tracking-widest text-gray-400 block mb-1">← Previous Article</span>
                            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#d5a94e] line-clamp-2">{{ $prevArticle->title }}</span>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($nextArticle)
                        <a href="{{ route('ethereal-edit.show', $nextArticle->slug) }}"
                           class="p-4 rounded-xl border border-gray-100 hover:border-[#d5a94e] transition-colors group block text-right">
                            <span class="text-[10px] uppercase tracking-widest text-gray-400 block mb-1">Next Article →</span>
                            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#d5a94e] line-clamp-2">{{ $nextArticle->title }}</span>
                        </a>
                    @endif
                </div>

            </div>

            <!-- Sticky Sidebar Column -->
            <aside class="space-y-8 sticky top-24">
                
                <!-- Table of Contents / Highlights -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="font-fragment text-sm uppercase tracking-[0.14em] text-gray-900 pb-3 border-b border-gray-100 mb-4">
                        Key Editorial Topics
                    </h3>
                    <ul class="space-y-3 text-xs text-gray-600">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#d5a94e] font-bold">01</span>
                            <span>Ontario real estate macro economic climate</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#d5a94e] font-bold">02</span>
                            <span>Pre-construction inventory &amp; builder assignment rules</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#d5a94e] font-bold">03</span>
                            <span>First-time buyer incentives &amp; cash back rebates</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#d5a94e] font-bold">04</span>
                            <span>Corridor spotlight: Durham, York &amp; Halton regions</span>
                        </li>
                    </ul>
                </div>

                <!-- Pre-Construction Spotlight CTA -->
                <div class="bg-[#06130d] text-white p-6 rounded-2xl text-center">
                    <span class="text-[#d5a94e] text-[10px] font-bold tracking-[0.2em] uppercase block mb-2">
                        VIP Allocations
                    </span>
                    <h4 class="font-fragment text-lg uppercase tracking-wide mb-3">
                        Homes Worth The Wait
                    </h4>
                    <p class="text-xs text-white/70 font-light leading-relaxed mb-5">
                        Access platinum pricing and floor plans for premier developments across the Greater Toronto Area before public release.
                    </p>
                    <a href="{{ route('pre-construction') }}"
                       class="inline-block w-full py-3 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 font-semibold text-xs uppercase tracking-wider rounded-md transition-colors">
                        Browse Pre-Construction
                    </a>
                </div>

                <!-- Private Advisory Consultation -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h4 class="font-fragment text-sm uppercase tracking-wide text-gray-900 mb-2">
                        Schedule a Strategy Session
                    </h4>
                    <p class="text-xs text-gray-500 font-light leading-relaxed mb-4">
                        Speak directly with an Ethereal portfolio advisor regarding your acquisition goals.
                    </p>
                    <a href="{{ route('contact') }}"
                       class="block text-center py-2.5 border border-gray-200 hover:border-[#d5a94e] text-xs font-semibold text-gray-800 rounded-md transition-colors">
                        Contact Advisory
                    </a>
                </div>

            </aside>

        </div>
    </section>
</x-app-layout>
