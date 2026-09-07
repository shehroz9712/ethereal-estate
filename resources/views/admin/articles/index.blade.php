<x-admin-layout heading="Ethereal Edit Posts">
    <div class="space-y-8" x-data="{ createOpen: false }">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                    The Ethereal Edit &amp; Market Insights
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                    Publish research analyses, market intelligence briefs, and advisory reports.
                </p>
            </div>
            <button type="button" @click="createOpen = !createOpen"
                    class="px-4 py-2.5 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm self-start sm:self-auto cursor-pointer">
                <span x-text="createOpen ? '✕ Close Post Editor' : '+ New Editorial Post'"></span>
            </button>
        </div>

        <!-- Post Creation Card -->
        <div x-show="createOpen" x-collapse
             class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
            <h2 class="font-fragment text-base uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                Write &amp; Publish Editorial
            </h2>

            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Article Title *
                        </label>
                        <input type="text" id="title" name="title" required
                               placeholder="e.g. Ontario Pre-Construction Outlook: Q3 2026 Opportunities"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Category *
                        </label>
                        <select id="category" name="category" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                            <option value="Market Trends">Market Trends</option>
                            <option value="Pre-Construction">Pre-Construction</option>
                            <option value="Investment Strategies">Investment Strategies</option>
                            <option value="Community Spotlight">Community Spotlight</option>
                            <option value="Architecture &amp; Design">Architecture &amp; Design</option>
                        </select>
                    </div>

                    <div>
                        <label for="published_at" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Publication Date
                        </label>
                        <input type="date" id="published_at" name="published_at" value="{{ date('Y-m-d') }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Article Cover Photograph
                        </label>
                        <input type="file" id="image" name="image" accept="image/*"
                               class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-600 focus:outline-none" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="excerpt" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Short Excerpt / Lead
                        </label>
                        <textarea id="excerpt" name="excerpt" rows="2"
                                  placeholder="One or two sentence summary of the key takeaways..."
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]"></textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Article Body Content *
                        </label>
                        <textarea id="content" name="content" rows="8" required
                                  placeholder="Full editorial analysis..."
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" checked
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <span class="text-xs font-semibold text-gray-700">Publish Immediately</span>
                    </label>

                    <button type="submit"
                            class="px-6 py-2.5 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm cursor-pointer">
                        Publish Article
                    </button>
                </div>
            </form>
        </div>

        <!-- Articles Table -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3.5 px-6 font-semibold">Article</th>
                            <th class="py-3.5 px-6 font-semibold">Category</th>
                            <th class="py-3.5 px-6 font-semibold">Author</th>
                            <th class="py-3.5 px-6 font-semibold">Publication Date</th>
                            <th class="py-3.5 px-6 font-semibold">Status</th>
                            <th class="py-3.5 px-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($articles as $article)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900 flex items-center gap-3">
                                    <img src="{{ $article->full_image_url }}"
                                         onerror="this.src='{{ asset('assets/images/news-art-1.jpg') }}'"
                                         alt=""
                                         class="w-12 h-12 rounded-lg object-cover bg-gray-100 shadow-sm flex-shrink-0" />
                                    <div class="min-w-0">
                                        <a href="{{ route('news.show', $article->slug) }}" target="_blank"
                                           class="font-semibold text-gray-900 hover:text-[#d5a94e] transition-colors line-clamp-1">
                                            {{ $article->title }}
                                        </a>
                                        <span class="text-[11px] text-gray-400 font-light block line-clamp-1">
                                            {{ $article->excerpt ?? Str::limit($article->content, 60) }}
                                        </span>
                                    </div>
                                </td>

                                <td class="py-4 px-6 text-gray-600">
                                    <span class="px-2 py-0.5 rounded bg-gray-100 text-gray-700 text-[10px] font-semibold uppercase tracking-wider">
                                        {{ $article->category ?? 'Market Insights' }}
                                    </span>
                                </td>

                                <td class="py-4 px-6 text-gray-600">
                                    {{ $article->author_name ?? 'Nakul Sood' }}
                                </td>

                                <td class="py-4 px-6 text-gray-500 whitespace-nowrap">
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                </td>

                                <td class="py-4 px-6">
                                    @if($article->is_published)
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                                            Published
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('news.show', $article->slug) }}" target="_blank"
                                           class="p-1.5 text-gray-400 hover:text-gray-900 transition-colors" title="View Public Post">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>

                                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this editorial article?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-red-400 hover:text-red-700 transition-colors cursor-pointer" title="Delete Article">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-400">
                                    No editorial articles published yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($articles->hasPages())
                <div class="p-4 border-t border-gray-100 flex justify-center">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>
