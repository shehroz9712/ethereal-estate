<x-user-layout title="Client Dashboard">
    <div class="space-y-8">
        
        <!-- Welcome Hero Banner -->
        <div class="relative overflow-hidden rounded-2xl bg-[#06130d] text-white p-6 sm:p-8 shadow-sm">
            <div class="absolute right-0 top-0 bottom-0 w-1/2 opacity-20 pointer-events-none">
                <img src="{{ asset('assets/images/about-hero.jpg') }}" alt="" class="w-full h-full object-cover" />
            </div>
            
            <div class="relative z-10 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#d5a94e]/20 text-[#d5a94e] text-[11px] font-semibold tracking-wider uppercase mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#d5a94e] animate-pulse"></span>
                    Platinum VIP Member
                </div>
                <h1 class="font-fragment text-2xl sm:text-4xl uppercase tracking-[0.04em] leading-tight mb-2">
                    Welcome, {{ $user->name }}
                </h1>
                <p class="text-white/70 text-xs sm:text-sm font-light leading-relaxed">
                    Track your registered pre-construction interests, saved developments, and dedicated portfolio consultations in one refined place.
                </p>
            </div>
        </div>

        <!-- Metrics Overview Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <p class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1">Saved Properties</p>
                <div class="flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ count($metrics['saved_properties']) }}</span>
                    <a href="{{ route('user.saved-properties') }}" class="text-xs text-[#d5a94e] font-semibold hover:underline">View All →</a>
                </div>
                <p class="text-[11px] text-gray-500 mt-2 font-light">Shortlisted communities</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <p class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1">VIP Inquiries</p>
                <div class="flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ count($metrics['inquiries']) }}</span>
                    <span class="text-xs px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-medium">Active</span>
                </div>
                <p class="text-[11px] text-gray-500 mt-2 font-light">Registrations submitted</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <p class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1">Early Access</p>
                <div class="flex items-baseline justify-between">
                    <span class="text-base font-semibold text-[#1a2e1e] font-fragment uppercase">Unlocked</span>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                </div>
                <p class="text-[11px] text-gray-500 mt-2 font-light">Priority builder tier allocations</p>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <p class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold mb-1">Senior Advisor</p>
                <p class="text-sm font-semibold text-gray-900 mt-1">Nakul Sood</p>
                <p class="text-[11px] text-gray-500 mt-2 font-light">Direct advisory available</p>
            </div>

        </div>

        <!-- Section: Your Inquiries & Status -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="font-fragment text-lg uppercase tracking-wide text-gray-900">Your Registered Requests</h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">Status updates on your VIP allocations and consultations.</p>
                </div>
                <a href="{{ route('pre-construction') }}" class="text-xs font-semibold text-[#d5a94e] hover:underline">
                    + Inquire on New Release
                </a>
            </div>

            @if(count($metrics['inquiries']) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                            <tr>
                                <th class="py-3 px-6 font-semibold">Property / Subject</th>
                                <th class="py-3 px-6 font-semibold">Type</th>
                                <th class="py-3 px-6 font-semibold">Date Submitted</th>
                                <th class="py-3 px-6 font-semibold">Status</th>
                                <th class="py-3 px-6 font-semibold text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($metrics['inquiries'] as $inq)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-4 px-6 font-medium text-gray-900">
                                        @if($inq->property)
                                            <a href="{{ route('properties.show', $inq->property->slug) }}" class="hover:text-[#d5a94e] font-semibold">
                                                {{ $inq->property->title }}
                                            </a>
                                            <span class="block text-[11px] text-gray-500 font-light">{{ $inq->property->city }}, {{ $inq->property->province }}</span>
                                        @else
                                            <span>{{ $inq->subject ?? 'General Portfolio Inquiry' }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 uppercase tracking-wider text-[11px] text-gray-500">
                                        {{ str_replace('_', ' ', $inq->inquiry_type) }}
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">
                                        {{ $inq->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($inq->status === 'new')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-blue-50 text-blue-700">
                                                Under Review
                                            </span>
                                        @elseif($inq->status === 'contacted')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-amber-50 text-amber-700">
                                                Advisor In Touch
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                                                Completed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('contact') }}" class="text-xs text-gray-600 hover:text-[#d5a94e] font-medium">
                                            Contact Desk →
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-10 text-center">
                    <p class="text-sm text-gray-500 mb-4 font-light">You haven't requested any property packages or VIP allocations yet.</p>
                    <a href="{{ route('pre-construction') }}" class="inline-block px-5 py-2.5 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded-md text-xs uppercase tracking-wider font-semibold transition-colors">
                        Browse Homes Worth The Wait
                    </a>
                </div>
            @endif
        </div>

        <!-- Section: Saved Properties Quick Peek -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="font-fragment text-lg uppercase tracking-wide text-gray-900">Your Shortlist</h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">Properties you bookmarked for review.</p>
                </div>
                <a href="{{ route('user.saved-properties') }}" class="text-xs font-semibold text-[#d5a94e] hover:underline">
                    Manage All ({{ count($metrics['saved_properties']) }}) →
                </a>
            </div>

            @if(count($metrics['saved_properties']) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($metrics['saved_properties']->take(3) as $property)
                        <div class="group border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                <span class="absolute top-3 left-3 bg-[#06130d]/80 backdrop-blur-sm text-[#d5a94e] text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded">
                                    {{ $property->property_type }}
                                </span>
                            </div>
                            <div class="p-4">
                                <p class="text-xs font-semibold text-[#d5a94e] mb-1">{{ $property->formatted_price }}</p>
                                <h3 class="font-fragment text-base uppercase text-gray-900 group-hover:text-[#d5a94e] transition-colors truncate">
                                    <a href="{{ route('properties.show', $property->slug) }}">{{ $property->title }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 font-light mt-1">{{ $property->city }}, {{ $property->province }}</p>
                                <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between">
                                    <span class="text-[11px] text-gray-500">{{ $property->bedrooms }} Bed • {{ $property->bathrooms }} Bath</span>
                                    <a href="{{ route('properties.show', $property->slug) }}" class="text-xs font-semibold text-[#1a2e1e] hover:underline">
                                        Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-8 text-center bg-gray-50 rounded-xl">
                    <p class="text-xs text-gray-500 font-light mb-3">No properties saved yet.</p>
                    <a href="{{ route('properties.index') }}" class="text-xs font-semibold text-[#d5a94e] hover:underline">
                        Explore Featured Properties →
                    </a>
                </div>
            @endif
        </div>

    </div>
</x-user-layout>
