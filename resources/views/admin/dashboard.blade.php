<x-admin-layout heading="Executive Overview">
    <div class="space-y-8">
        
        <!-- Welcome Top Banner -->
        <div class="bg-[#06130d] text-white p-6 sm:p-8 rounded-2xl shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="text-[#d5a94e] text-xs uppercase tracking-widest font-semibold block mb-1">Administrator Control</span>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide">
                    Ethereal Estates Command Center
                </h1>
                <p class="text-xs sm:text-sm text-white/60 font-light mt-1">
                    Manage high-value pre-construction developments, client inquiries, and editorial publications.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.properties.create') }}"
                   class="px-4 py-2.5 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm whitespace-nowrap">
                    + Add New Property
                </a>
                <a href="{{ route('admin.articles.index') }}"
                   class="px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors whitespace-nowrap">
                    + New Editorial
                </a>
            </div>
        </div>

        <!-- KPI Metrics Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            
            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Total Properties</span>
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                </div>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ $metrics['total_properties'] }}</span>
                    <span class="text-xs text-gray-500">{{ $metrics['active_properties'] }} Active</span>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Pre-Construction:</span>
                    <span class="font-semibold text-gray-900">{{ $metrics['preconstruction_count'] }}</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Inquiries &amp; Leads</span>
                    @if($metrics['new_inquiries'] > 0)
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">
                            {{ $metrics['new_inquiries'] }} NEW
                        </span>
                    @endif
                </div>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ $metrics['total_inquiries'] }}</span>
                    <a href="{{ route('admin.inquiries.index') }}" class="text-xs text-[#d5a94e] font-semibold hover:underline">View All →</a>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Subscribers:</span>
                    <span class="font-semibold text-gray-900">{{ $metrics['total_subscribers'] }}</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Registered Clients</span>
                    <span class="text-xs text-emerald-600 font-semibold">Active</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ $metrics['total_users'] }}</span>
                    <a href="{{ route('admin.users.index') }}" class="text-xs text-[#d5a94e] font-semibold hover:underline">Manage →</a>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>VIP Circle:</span>
                    <span class="font-semibold text-gray-900">100% Verified</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Ethereal Edit</span>
                    <span class="text-xs text-gray-400">Articles</span>
                </div>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-3xl font-fragment text-gray-900">{{ $metrics['total_articles'] }}</span>
                    <a href="{{ route('admin.articles.index') }}" class="text-xs text-[#d5a94e] font-semibold hover:underline">Manage →</a>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Status:</span>
                    <span class="font-semibold text-emerald-600">Published</span>
                </div>
            </div>

        </div>

        <!-- Recent Inquiries Section -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="font-fragment text-lg uppercase tracking-wide text-gray-900">Recent Leads &amp; Consultations</h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">Prospective buyers inquiring through property modals and contact forms.</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-semibold text-[#d5a94e] hover:underline">
                    View Full Lead Log ({{ $metrics['total_inquiries'] }}) →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3 px-6 font-semibold">Client Name</th>
                            <th class="py-3 px-6 font-semibold">Contact Info</th>
                            <th class="py-3 px-6 font-semibold">Inquiry Subject / Property</th>
                            <th class="py-3 px-6 font-semibold">Type</th>
                            <th class="py-3 px-6 font-semibold">Status</th>
                            <th class="py-3 px-6 font-semibold text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($metrics['recent_inquiries'] as $inq)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-900">
                                    {{ $inq->name }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    <div class="font-medium text-gray-900">{{ $inq->email }}</div>
                                    <div class="text-[11px] text-gray-400">{{ $inq->phone ?? 'No phone provided' }}</div>
                                </td>
                                <td class="py-4 px-6 text-gray-700">
                                    @if($inq->property)
                                        <a href="{{ route('properties.show', $inq->property->slug) }}" target="_blank" class="font-medium text-[#1a2e1e] hover:underline">
                                            {{ $inq->property->title }}
                                        </a>
                                        <span class="block text-[11px] text-gray-400">{{ $inq->property->city }}</span>
                                    @else
                                        <span>{{ $inq->subject ?? 'General Portfolio Consultation' }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 uppercase text-[10px] tracking-wider text-gray-500">
                                    {{ str_replace('_', ' ', $inq->inquiry_type) }}
                                </td>
                                <td class="py-4 px-6">
                                    @if($inq->status === 'new')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">
                                            New Lead
                                        </span>
                                    @elseif($inq->status === 'contacted')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-blue-100 text-blue-800">
                                            Contacted
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-emerald-100 text-emerald-800">
                                            Resolved
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right text-gray-400">
                                    {{ $inq->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-400">No recent inquiries logged.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Properties Table -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="font-fragment text-lg uppercase tracking-wide text-gray-900">Recently Updated Properties</h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">Quick overview of inventory status across Ontario.</p>
                </div>
                <a href="{{ route('admin.properties.index') }}" class="text-xs font-semibold text-[#d5a94e] hover:underline">
                    Manage All Properties →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3 px-6 font-semibold">Listing</th>
                            <th class="py-3 px-6 font-semibold">City</th>
                            <th class="py-3 px-6 font-semibold">Type</th>
                            <th class="py-3 px-6 font-semibold">Price</th>
                            <th class="py-3 px-6 font-semibold">Status</th>
                            <th class="py-3 px-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($metrics['recent_properties'] as $prop)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-3.5 px-6 font-medium text-gray-900 flex items-center gap-3">
                                    <img src="{{ $prop->primary_image_url }}" alt="" class="w-10 h-10 rounded object-cover bg-gray-100" />
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $prop->title }}</p>
                                        <p class="text-[11px] text-gray-400">{{ $prop->address ?? 'Pre-construction' }}</p>
                                    </div>
                                </td>
                                <td class="py-3.5 px-6 text-gray-600">{{ $prop->city }}</td>
                                <td class="py-3.5 px-6 text-gray-600">{{ $prop->property_type }}</td>
                                <td class="py-3.5 px-6 font-semibold text-gray-900">{{ $prop->formatted_price }}</td>
                                <td class="py-3.5 px-6">
                                    @if($prop->is_active)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-100 text-gray-600">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-6 text-right space-x-2">
                                    <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-800">Live ↗</a>
                                    <a href="{{ route('admin.properties.edit', $prop->id) }}" class="text-[#d5a94e] hover:underline font-semibold">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
