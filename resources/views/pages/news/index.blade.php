<x-layouts.app title="Ethereal Edit — Articles, Market Insights & Project Content" activePage="ethereal-edit">
    <!-- HERO HEADER -->
    <div class="px-4 lg:px-14 pt-4">
        <div class="relative w-full rounded-2xl overflow-hidden min-h-[340px] sm:min-h-[400px] flex items-center justify-center text-center p-8 bg-[#06130d]">
            <img src="{{ asset('assets/images/news-hero.jpg') }}"
                 onerror="this.src='{{ asset('assets/images/about-hero.jpg') }}'"
                 alt="Ethereal Edit Hero"
                 class="absolute inset-0 w-full h-full object-cover opacity-35" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#06130d] via-black/40 to-black/30"></div>

            <div class="relative z-10 max-w-2xl mx-auto text-white">
                <span class="inline-block text-[#c5983e] text-xs font-semibold tracking-[0.28em] uppercase mb-4">
                    Editorial Collection
                </span>
                <h1 class="font-fragment text-3xl sm:text-5xl lg:text-6xl uppercase tracking-[0.05em] leading-tight mb-4">
                    Ethereal Edit
                </h1>
                <p class="text-white/80 text-sm sm:text-base font-light leading-relaxed max-w-xl mx-auto">
                    Curated articles, market intelligence, pre-construction developments, and luxury architectural insights across Ontario.
                </p>
            </div>
        </div>
    </div>

    <!-- MAIN EDITORIAL SECTION -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-[#fbfbf9]">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 mb-12 border-b border-gray-200">
                <div>
                    <p class="text-[#d5a94e] text-xs font-semibold tracking-[0.24em] uppercase mb-2">
                        Curated Perspectives
                    </p>
                    <h2 class="font-fragment text-2xl sm:text-4xl text-[#06130d] uppercase tracking-[0.04em]">
                        Latest Publications
                    </h2>
                </div>
                <div class="text-xs text-gray-500 font-medium">
                    Showing {{ $articles->total() }} published insights
                </div>
            </div>

            <!-- Articles Feed -->
            <div class="divide-y divide-gray-200">
                @forelse($articles as $article)
                    <article class="grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-8 lg:gap-14 items-center py-10 first:pt-0 group">
                        <div class="order-2 lg:order-1">
                            <div class="flex items-center gap-4 text-xs text-gray-500 font-medium mb-3">
                                <span class="px-2.5 py-1 rounded bg-[#1a2e1e]/5 text-[#1a2e1e] font-semibold text-[11px] uppercase tracking-wider">
                                    {{ $article->category ?? 'Real Estate' }}
                                </span>
                                <span>•</span>
                                <time datetime="{{ $article->published_at?->toDateString() }}">
                                    {{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }}
                                </time>
                                <span>•</span>
                                <span>By {{ $article->author_name ?? 'Ethereal Advisory' }}</span>
                            </div>

                            <h3 class="font-fragment text-2xl sm:text-3xl text-gray-900 uppercase leading-tight mb-4 group-hover:text-[#d5a94e] transition-colors">
                                <a href="{{ route('ethereal-edit.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <p class="text-sm sm:text-base text-gray-600 font-light leading-relaxed mb-6 line-clamp-3">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 180) }}
                            </p>

                            <a href="{{ route('ethereal-edit.show', $article->slug) }}"
                               class="inline-flex items-center gap-3 text-xs uppercase tracking-[0.16em] font-semibold text-[#1a2e1e] group-hover:text-[#d5a94e] transition-colors">
                                <span>Read Full Editorial</span>
                                <span class="w-8 h-8 rounded-full bg-[#1a2e1e] group-hover:bg-[#d5a94e] text-white flex items-center justify-center transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </span>
                            </a>
                        </div>

                        <div class="order-1 lg:order-2 overflow-hidden rounded-xl bg-gray-100 aspect-[16/10] shadow-sm">
                            <a href="{{ route('ethereal-edit.show', $article->slug) }}" class="block w-full h-full">
                                <img src="{{ $article->full_image_url }}"
                                     onerror="this.src='{{ asset('assets/images/prop-2.jpg') }}'"
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out" />
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm my-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        <h4 class="text-lg font-medium text-gray-900 mb-1">No Articles Published Yet</h4>
                        <p class="text-sm text-gray-500">Check back soon for new research reports, market insights, and interviews.</p>
                    </div>
                @endforelse
            </div>

            <!-- Custom Pagination -->
            @if($articles->hasPages())
                <div class="mt-14 pt-8 border-t border-gray-200 flex justify-center">
                    {{ $articles->links() }}
                </div>
            @endif

        </div>
    </section>

    <!-- VIP NEWSLETTER SUBSCRIPTION BANNER -->
    <section class="bg-[#06130d] text-white py-16 px-6 lg:px-14 border-t border-white/10">
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-[#d5a94e] text-xs font-bold tracking-[0.24em] uppercase mb-3 block">
                Private Advisory
            </span>
            <h3 class="font-fragment text-2xl sm:text-4xl uppercase tracking-[0.04em] mb-4">
                Receive Unreleased Market Intelligence
            </h3>
            <p class="text-white/70 text-sm sm:text-base font-light max-w-xl mx-auto mb-8">
                Subscribe to our curated monthly brief delivering off-market allocations, builder incentives, and macro trends directly to your inbox.
            </p>

            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto flex flex-col sm:flex-row gap-3">
                @csrf
                <input type="email" name="email" required placeholder="Enter your email address..."
                       class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-md text-sm text-white placeholder-white/50 focus:outline-none focus:border-[#d5a94e]" />
                <button type="submit"
                        class="px-6 py-3 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 font-semibold text-xs uppercase tracking-[0.14em] rounded-md transition-colors whitespace-nowrap cursor-pointer">
                    Join Briefing
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
