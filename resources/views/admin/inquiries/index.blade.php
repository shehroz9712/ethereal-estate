<x-admin-layout heading="Inquiries &amp; VIP Leads">
    <div class="space-y-6" x-data="{ activeInquiry: null, modalOpen: false }">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                    Lead Management &amp; Inquiries
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                    Manage client consultations, platinum pre-construction registrations, and buyer requests.
                </p>
            </div>
            <div class="text-xs text-gray-500 font-medium">
                {{ $inquiries->total() }} Total Inquiries Logged
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white p-4 rounded-xl border border-gray-200/80 shadow-sm">
            <form action="{{ route('admin.inquiries.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                
                <div>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search client name, email, phone..."
                           class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                </div>

                <div>
                    <select name="type" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                        <option value="">All Inquiry Types</option>
                        <option value="general" {{ ($filters['type'] ?? '') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="preconstruction" {{ ($filters['type'] ?? '') == 'preconstruction' ? 'selected' : '' }}>Pre-Construction VIP</option>
                        <option value="vip_registration" {{ ($filters['type'] ?? '') == 'vip_registration' ? 'selected' : '' }}>VIP Registration</option>
                        <option value="tour" {{ ($filters['type'] ?? '') == 'tour' ? 'selected' : '' }}>Private Tour Request</option>
                        <option value="join_team" {{ ($filters['type'] ?? '') == 'join_team' ? 'selected' : '' }}>Join Ethereal Career</option>
                    </select>
                </div>

                <div>
                    <select name="status" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                        <option value="">All Statuses</option>
                        <option value="new" {{ ($filters['status'] ?? '') == 'new' ? 'selected' : '' }}>New Leads</option>
                        <option value="contacted" {{ ($filters['status'] ?? '') == 'contacted' ? 'selected' : '' }}>Advisor Contacted</option>
                        <option value="resolved" {{ ($filters['status'] ?? '') == 'resolved' ? 'selected' : '' }}>Resolved / Closed</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2 bg-[#1a2e1e] hover:bg-gray-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors cursor-pointer">
                        Filter Leads
                    </button>
                    @if(!empty($filters['search']) || !empty($filters['type']) || !empty($filters['status']))
                        <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-2 border border-gray-200 hover:border-gray-400 text-gray-600 rounded-lg text-xs font-semibold transition-colors">
                            Reset
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Inquiries Table -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3.5 px-6 font-semibold">Buyer / Client</th>
                            <th class="py-3.5 px-6 font-semibold">Property / Subject</th>
                            <th class="py-3.5 px-6 font-semibold">Type</th>
                            <th class="py-3.5 px-6 font-semibold">Received</th>
                            <th class="py-3.5 px-6 font-semibold">Status &amp; Workflow</th>
                            <th class="py-3.5 px-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($inquiries as $inquiry)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900">
                                    <div class="font-semibold text-gray-900 text-sm">{{ $inquiry->name }}</div>
                                    <div class="text-xs text-gray-600 mt-0.5">
                                        <a href="mailto:{{ $inquiry->email }}" class="hover:text-[#d5a94e]">{{ $inquiry->email }}</a>
                                    </div>
                                    @if($inquiry->phone)
                                        <div class="text-[11px] text-gray-400 mt-0.5">
                                            <a href="tel:{{ $inquiry->phone }}" class="hover:text-gray-600">{{ $inquiry->phone }}</a>
                                        </div>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-700">
                                    @if($inquiry->property)
                                        <a href="{{ route('properties.show', $inquiry->property->slug) }}" target="_blank"
                                           class="font-semibold text-[#1a2e1e] hover:underline flex items-center gap-1">
                                            <span>{{ $inquiry->property->title }}</span>
                                            <span class="text-[10px] text-gray-400">↗</span>
                                        </a>
                                        <span class="block text-[11px] text-gray-400">{{ $inquiry->property->city }}, {{ $inquiry->property->province }}</span>
                                    @else
                                        <span class="font-medium text-gray-800">{{ $inquiry->subject ?? 'General Portfolio Consultation' }}</span>
                                    @endif

                                    @if($inquiry->message)
                                        <p class="text-[11px] text-gray-500 line-clamp-1 italic mt-1 max-w-xs">
                                            "{{ $inquiry->message }}"
                                        </p>
                                    @endif
                                </td>

                                <td class="py-4 px-6">
                                    <span class="inline-block px-2.5 py-1 rounded bg-gray-100 text-gray-700 text-[10px] font-semibold uppercase tracking-wider">
                                        {{ str_replace('_', ' ', $inquiry->inquiry_type) }}
                                    </span>
                                </td>

                                <td class="py-4 px-6 text-gray-500 whitespace-nowrap">
                                    <div>{{ $inquiry->created_at->format('M d, Y') }}</div>
                                    <div class="text-[10px] text-gray-400">{{ $inquiry->created_at->format('h:i A') }}</div>
                                </td>

                                <td class="py-4 px-6">
                                    <form action="{{ route('admin.inquiries.update-status', $inquiry->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                                class="text-xs px-2.5 py-1 rounded border font-medium focus:outline-none cursor-pointer
                                                {{ $inquiry->status === 'new' ? 'bg-amber-50 text-amber-900 border-amber-200' : ($inquiry->status === 'contacted' ? 'bg-blue-50 text-blue-900 border-blue-200' : 'bg-emerald-50 text-emerald-900 border-emerald-200') }}">
                                            <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New Lead</option>
                                            <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="resolved" {{ $inquiry->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button"
                                                @click="activeInquiry = {{ json_encode([
                                                    'name' => $inquiry->name,
                                                    'email' => $inquiry->email,
                                                    'phone' => $inquiry->phone,
                                                    'subject' => $inquiry->subject,
                                                    'property' => $inquiry->property ? $inquiry->property->title : null,
                                                    'type' => str_replace('_', ' ', $inquiry->inquiry_type),
                                                    'message' => $inquiry->message,
                                                    'date' => $inquiry->created_at->format('F d, Y \a\t h:i A'),
                                                    'status' => $inquiry->status
                                                ]) }}; modalOpen = true"
                                                class="px-2.5 py-1 bg-gray-100 hover:bg-[#d5a94e] hover:text-gray-900 text-gray-700 rounded text-xs font-semibold transition-colors cursor-pointer">
                                            View Details
                                        </button>

                                        <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this inquiry?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-red-400 hover:text-red-700 transition-colors cursor-pointer" title="Delete Inquiry">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-400">
                                    No inquiries found for this filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($inquiries->hasPages())
                <div class="p-4 border-t border-gray-100 flex justify-center">
                    {{ $inquiries->withQueryString()->links() }}
                </div>
            @endif
        </div>

        <!-- Detail Modal -->
        <div x-show="modalOpen" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
             @keydown.escape.window="modalOpen = false">
            <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl space-y-6 relative" @click.away="modalOpen = false">
                <button type="button" @click="modalOpen = false" class="absolute top-5 right-5 text-gray-400 hover:text-gray-900 text-lg font-bold">
                    ✕
                </button>

                <div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#d5a94e]" x-text="activeInquiry?.type"></span>
                    <h3 class="font-fragment text-xl uppercase tracking-wide text-gray-900 mt-1" x-text="activeInquiry?.name"></h3>
                    <p class="text-xs text-gray-500" x-text="activeInquiry?.date"></p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 space-y-2 text-xs">
                    <div>
                        <span class="font-semibold text-gray-500">Email:</span>
                        <a :href="'mailto:' + activeInquiry?.email" class="text-gray-900 hover:text-[#d5a94e] font-medium ml-1" x-text="activeInquiry?.email"></a>
                    </div>
                    <div x-show="activeInquiry?.phone">
                        <span class="font-semibold text-gray-500">Phone:</span>
                        <a :href="'tel:' + activeInquiry?.phone" class="text-gray-900 hover:text-[#d5a94e] font-medium ml-1" x-text="activeInquiry?.phone"></a>
                    </div>
                    <div x-show="activeInquiry?.property">
                        <span class="font-semibold text-gray-500">Inquired Property:</span>
                        <span class="font-bold text-[#1a2e1e] ml-1" x-text="activeInquiry?.property"></span>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-700 mb-2">Message Content</h4>
                    <div class="p-4 bg-gray-50 border border-gray-100 rounded-xl text-xs text-gray-700 font-light leading-relaxed whitespace-pre-line"
                         x-text="activeInquiry?.message || 'No written message attached. Requested callback / floor plan package.'">
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="button" @click="modalOpen = false"
                            class="px-5 py-2 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors cursor-pointer">
                        Close
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
