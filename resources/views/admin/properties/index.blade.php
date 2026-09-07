<x-admin-layout heading="Properties &amp; Developments">
    <div class="space-y-6">
        
        <!-- Header Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                    Properties &amp; Projects
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                    Manage all Ontario pre-construction and featured residential listings.
                </p>
            </div>
            <a href="{{ route('admin.properties.create') }}"
               class="px-4 py-2.5 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm self-start sm:self-auto cursor-pointer">
                + Add New Listing
            </a>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white p-4 rounded-xl border border-gray-200/80 shadow-sm">
            <form action="{{ route('admin.properties.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                
                <div>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search title, address, city..."
                           class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                </div>

                <div>
                    <select name="type" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                        <option value="">All Property Types</option>
                        <option value="Detached" {{ ($filters['type'] ?? '') == 'Detached' ? 'selected' : '' }}>Detached Home</option>
                        <option value="Townhome" {{ ($filters['type'] ?? '') == 'Townhome' ? 'selected' : '' }}>Townhome</option>
                        <option value="Condominium" {{ ($filters['type'] ?? '') == 'Condominium' ? 'selected' : '' }}>Condominium</option>
                        <option value="Estate" {{ ($filters['type'] ?? '') == 'Estate' ? 'selected' : '' }}>Luxury Estate</option>
                    </select>
                </div>

                <div>
                    <select name="status" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                        <option value="">All Listing Statuses</option>
                        <option value="active" {{ ($filters['status'] ?? '') == 'active' ? 'selected' : '' }}>Active Only</option>
                        <option value="inactive" {{ ($filters['status'] ?? '') == 'inactive' ? 'selected' : '' }}>Inactive / Draft</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2 bg-[#1a2e1e] hover:bg-gray-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors cursor-pointer">
                        Filter
                    </button>
                    @if(!empty($filters['search']) || !empty($filters['type']) || !empty($filters['status']))
                        <a href="{{ route('admin.properties.index') }}" class="px-3 py-2 border border-gray-200 hover:border-gray-400 text-gray-600 rounded-lg text-xs font-semibold transition-colors">
                            Reset
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Properties Table -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3.5 px-6 font-semibold">Property</th>
                            <th class="py-3.5 px-6 font-semibold">Location</th>
                            <th class="py-3.5 px-6 font-semibold">Pricing</th>
                            <th class="py-3.5 px-6 font-semibold">Tags &amp; Flags</th>
                            <th class="py-3.5 px-6 font-semibold">Status</th>
                            <th class="py-3.5 px-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($properties as $property)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900 flex items-center gap-3">
                                    <img src="{{ $property->primary_image_url }}"
                                         onerror="this.src='{{ asset('assets/images/prop-1.jpg') }}'"
                                         alt=""
                                         class="w-12 h-12 rounded-lg object-cover bg-gray-100 shadow-sm flex-shrink-0" />
                                    <div class="min-w-0">
                                        <a href="{{ route('properties.show', $property->slug) }}" target="_blank"
                                           class="font-semibold text-gray-900 hover:text-[#d5a94e] transition-colors truncate block">
                                            {{ $property->title }}
                                        </a>
                                        <span class="text-[11px] text-gray-400 font-light block">
                                            {{ $property->bedrooms }} Bed • {{ $property->bathrooms }} Bath • {{ $property->property_type }}
                                        </span>
                                    </div>
                                </td>

                                <td class="py-4 px-6 text-gray-600">
                                    <p class="font-medium text-gray-900">{{ $property->city }}</p>
                                    <p class="text-[11px] text-gray-400">{{ $property->address ?? 'Region Corridor' }}</p>
                                </td>

                                <td class="py-4 px-6 font-semibold text-[#1a2e1e]">
                                    {{ $property->formatted_price }}
                                </td>

                                <td class="py-4 px-6">
                                    <div class="flex flex-wrap gap-1">
                                        @if($property->is_preconstruction)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-[#1a2e1e] text-white">
                                                Pre-Con
                                            </span>
                                        @endif
                                        @if($property->is_featured)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-[#d5a94e]/20 text-[#8e6c27]">
                                                Featured
                                            </span>
                                        @endif
                                        @if($property->is_mls)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-100 text-gray-700">
                                                MLS®
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="py-4 px-6">
                                    @if($property->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('properties.show', $property->slug) }}" target="_blank"
                                           class="p-1.5 text-gray-400 hover:text-gray-900 transition-colors" title="View Public Page">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>

                                        <a href="{{ route('admin.properties.edit', $property->id) }}"
                                           class="px-3 py-1.5 bg-gray-100 hover:bg-[#d5a94e] hover:text-gray-900 text-gray-700 rounded text-xs font-semibold transition-colors">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to permanently delete this listing?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-red-400 hover:text-red-700 transition-colors cursor-pointer" title="Delete Listing">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-400">
                                    No properties match your filter criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($properties->hasPages())
                <div class="p-4 border-t border-gray-100 flex justify-center">
                    {{ $properties->withQueryString()->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>
