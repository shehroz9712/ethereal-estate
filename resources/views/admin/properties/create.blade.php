<x-admin-layout heading="New Property Listing">
    <div class="max-w-4xl space-y-6">
        
        <div class="flex items-center justify-between pb-4 border-b border-gray-200">
            <div>
                <a href="{{ route('admin.properties.index') }}" class="text-xs text-gray-500 hover:text-gray-900 mb-1 inline-block">
                    ← Back to Properties List
                </a>
                <h1 class="font-fragment text-2xl uppercase tracking-wide text-gray-900">
                    Create Property or Pre-Construction Project
                </h1>
            </div>
        </div>

        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Basic Identification -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    1. Essential Information
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Property / Community Title *
                        </label>
                        <input type="text" id="title" name="title" required value="{{ old('title') }}"
                               placeholder="e.g. Orchard South | Detached Collection"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="developer" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Developer / Builder Name
                        </label>
                        <input type="text" id="developer" name="developer" value="{{ old('developer') }}"
                               placeholder="e.g. Ethereal Living Communities"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="property_type" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Property Type *
                        </label>
                        <select id="property_type" name="property_type" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                            <option value="Detached" {{ old('property_type') == 'Detached' ? 'selected' : '' }}>Detached Home</option>
                            <option value="Semi-Detached" {{ old('property_type') == 'Semi-Detached' ? 'selected' : '' }}>Semi-Detached Home</option>
                            <option value="Townhome" {{ old('property_type') == 'Townhome' ? 'selected' : '' }}>Luxury Townhome</option>
                            <option value="Condominium" {{ old('property_type') == 'Condominium' ? 'selected' : '' }}>Condominium Suite</option>
                            <option value="Estate" {{ old('property_type') == 'Estate' ? 'selected' : '' }}>Country Estate</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Sales Status *
                        </label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                            <option value="for_sale" {{ old('status') == 'for_sale' ? 'selected' : '' }}>For Sale / Available</option>
                            <option value="selling_fast" {{ old('status', 'selling_fast') == 'selling_fast' ? 'selected' : '' }}>Selling Fast / VIP Phase</option>
                            <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming / Coming Soon</option>
                            <option value="sold_out" {{ old('status') == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                        </select>
                    </div>

                    <div>
                        <label for="feature_line" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Feature / Catchline Tag
                        </label>
                        <input type="text" id="feature_line" name="feature_line" value="{{ old('feature_line') }}"
                               placeholder="e.g. 42' & 50' Luxury Lots in Bowmanville"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>
                </div>
            </div>

            <!-- Pricing & Specs -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    2. Pricing &amp; Specifications
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div>
                        <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Numeric Price (CAD $)
                        </label>
                        <input type="number" id="price" name="price" step="1000" value="{{ old('price') }}"
                               placeholder="1350000"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="price_label" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Custom Display Price Label
                        </label>
                        <input type="text" id="price_label" name="price_label" value="{{ old('price_label') }}"
                               placeholder="e.g. Starting from the Low $1.2Ms"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="bedrooms" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Bedrooms *
                        </label>
                        <input type="number" id="bedrooms" name="bedrooms" required min="0" value="{{ old('bedrooms', 3) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="bathrooms" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Bathrooms *
                        </label>
                        <input type="number" id="bathrooms" name="bathrooms" step="0.5" required min="0" value="{{ old('bathrooms', 2.5) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="sqft" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Square Footage *
                        </label>
                        <input type="number" id="sqft" name="sqft" required min="0" value="{{ old('sqft', 2400) }}"
                               placeholder="2400"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="garage" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Garage Spaces *
                        </label>
                        <input type="number" id="garage" name="garage" required min="0" value="{{ old('garage', 2) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="balcony" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Balconies / Terraces
                        </label>
                        <input type="number" id="balcony" name="balcony" min="0" value="{{ old('balcony', 1) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>
                </div>
            </div>

            <!-- Location & Map Coordinates -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    3. Location &amp; Map Coordinates
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="city" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            City / Town *
                        </label>
                        <input type="text" id="city" name="city" required value="{{ old('city') }}"
                               placeholder="e.g. Bowmanville"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('city') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Street Address / Intersection
                        </label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                               placeholder="e.g. Middle Rd & Concession St"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="latitude" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Latitude (for Map Marker)
                        </label>
                        <input type="number" id="latitude" name="latitude" step="0.000001" value="{{ old('latitude', '43.910000') }}"
                               placeholder="43.910000"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="longitude" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Longitude (for Map Marker)
                        </label>
                        <input type="number" id="longitude" name="longitude" step="0.000001" value="{{ old('longitude', '-78.680000') }}"
                               placeholder="-78.680000"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="model_home_address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Model Home / Presentation Centre Address
                        </label>
                        <input type="text" id="model_home_address" name="model_home_address" value="{{ old('model_home_address') }}"
                               placeholder="e.g. 1400 Middle Rd, Bowmanville, ON"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>
                </div>
            </div>

            <!-- Descriptions -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    4. Descriptions
                </h2>

                <div>
                    <label for="short_description" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Short Hook / Overview
                    </label>
                    <textarea id="short_description" name="short_description" rows="2"
                              placeholder="A refined boutique enclave of luxury detached homes..."
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">{{ old('short_description') }}</textarea>
                </div>

                <div>
                    <label for="full_description" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Full Comprehensive Description
                    </label>
                    <textarea id="full_description" name="full_description" rows="5"
                              placeholder="Detailed architectural notes, finishes, neighborhood perks..."
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">{{ old('full_description') }}</textarea>
                </div>
            </div>

            <!-- Flags & Visibility -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    5. Categorization &amp; Flags
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_preconstruction" value="1" {{ old('is_preconstruction', 1) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Pre-Construction Project</p>
                            <p class="text-[11px] text-gray-500">Show on Pre-Construction split map and catalog</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', 1) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Featured by Ethereal</p>
                            <p class="text-[11px] text-gray-500">Highlight on homepage showcase</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_mls" value="1" {{ old('is_mls') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">MLS® Listing</p>
                            <p class="text-[11px] text-gray-500">Include in MLS resale search track</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Published / Active</p>
                            <p class="text-[11px] text-gray-500">Visible to public buyers</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Media Uploads -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    6. Visual Photography &amp; Renderings
                </h2>

                <div>
                    <label for="primary_image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Cover / Primary Hero Image
                    </label>
                    <input type="file" id="primary_image" name="primary_image" accept="image/*"
                           class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-600 focus:outline-none" />
                    <p class="mt-1 text-[11px] text-gray-400">High-resolution horizontal JPG or PNG (up to 10MB).</p>
                </div>

                <div>
                    <label for="gallery_images" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Gallery &amp; Interior Showcase (Multiple Images)
                    </label>
                    <input type="file" id="gallery_images" name="gallery_images[]" multiple accept="image/*"
                           class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-600 focus:outline-none" />
                </div>
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.properties.index') }}" class="text-xs text-gray-500 hover:text-gray-900">
                    Cancel
                </a>
                <button type="submit"
                        class="px-8 py-3 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm cursor-pointer">
                    Publish Listing
                </button>
            </div>

        </form>

    </div>
</x-admin-layout>
