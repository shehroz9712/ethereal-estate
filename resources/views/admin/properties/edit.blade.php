<x-admin-layout heading="Edit Property Listing">
    <div class="max-w-4xl space-y-6">
        
        <div class="flex items-center justify-between pb-4 border-b border-gray-200">
            <div>
                <a href="{{ route('admin.properties.index') }}" class="text-xs text-gray-500 hover:text-gray-900 mb-1 inline-block">
                    ← Back to Properties List
                </a>
                <h1 class="font-fragment text-2xl uppercase tracking-wide text-gray-900">
                    Edit: {{ $property->title }}
                </h1>
            </div>
            <a href="{{ route('properties.show', $property->slug) }}" target="_blank"
               class="text-xs font-semibold text-[#d5a94e] hover:underline">
                View Public Listing ↗
            </a>
        </div>

        <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

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
                        <input type="text" id="title" name="title" required value="{{ old('title', $property->title) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="developer" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Developer / Builder Name
                        </label>
                        <input type="text" id="developer" name="developer" value="{{ old('developer', $property->developer) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="property_type" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Property Type *
                        </label>
                        <select id="property_type" name="property_type" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                            <option value="Detached" {{ old('property_type', $property->property_type) == 'Detached' ? 'selected' : '' }}>Detached Home</option>
                            <option value="Semi-Detached" {{ old('property_type', $property->property_type) == 'Semi-Detached' ? 'selected' : '' }}>Semi-Detached Home</option>
                            <option value="Townhome" {{ old('property_type', $property->property_type) == 'Townhome' ? 'selected' : '' }}>Luxury Townhome</option>
                            <option value="Condominium" {{ old('property_type', $property->property_type) == 'Condominium' ? 'selected' : '' }}>Condominium Suite</option>
                            <option value="Estate" {{ old('property_type', $property->property_type) == 'Estate' ? 'selected' : '' }}>Country Estate</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Sales Status *
                        </label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                            <option value="for_sale" {{ old('status', $property->status) == 'for_sale' ? 'selected' : '' }}>For Sale / Available</option>
                            <option value="selling_fast" {{ old('status', $property->status) == 'selling_fast' ? 'selected' : '' }}>Selling Fast / VIP Phase</option>
                            <option value="upcoming" {{ old('status', $property->status) == 'upcoming' ? 'selected' : '' }}>Upcoming / Coming Soon</option>
                            <option value="sold_out" {{ old('status', $property->status) == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                        </select>
                    </div>

                    <div>
                        <label for="feature_line" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Feature / Catchline Tag
                        </label>
                        <input type="text" id="feature_line" name="feature_line" value="{{ old('feature_line', $property->feature_line) }}"
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
                        <input type="number" id="price" name="price" step="1000" value="{{ old('price', $property->price) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="price_label" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Custom Display Price Label
                        </label>
                        <input type="text" id="price_label" name="price_label" value="{{ old('price_label', $property->price_label) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="bedrooms" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Bedrooms *
                        </label>
                        <input type="number" id="bedrooms" name="bedrooms" required min="0" value="{{ old('bedrooms', $property->bedrooms) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="bathrooms" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Bathrooms *
                        </label>
                        <input type="number" id="bathrooms" name="bathrooms" step="0.5" required min="0" value="{{ old('bathrooms', $property->bathrooms) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="sqft" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Square Footage *
                        </label>
                        <input type="number" id="sqft" name="sqft" required min="0" value="{{ old('sqft', $property->sqft) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="garage" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Garage Spaces *
                        </label>
                        <input type="number" id="garage" name="garage" required min="0" value="{{ old('garage', $property->garage) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="balcony" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Balconies / Terraces
                        </label>
                        <input type="number" id="balcony" name="balcony" min="0" value="{{ old('balcony', $property->balcony) }}"
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
                        <input type="text" id="city" name="city" required value="{{ old('city', $property->city) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('city') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Street Address / Intersection
                        </label>
                        <input type="text" id="address" name="address" value="{{ old('address', $property->address) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="latitude" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Latitude (Map Marker)
                        </label>
                        <input type="number" id="latitude" name="latitude" step="0.000001" value="{{ old('latitude', $property->latitude) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div>
                        <label for="longitude" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Longitude (Map Marker)
                        </label>
                        <input type="number" id="longitude" name="longitude" step="0.000001" value="{{ old('longitude', $property->longitude) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="model_home_address" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Model Home / Presentation Centre Address
                        </label>
                        <input type="text" id="model_home_address" name="model_home_address" value="{{ old('model_home_address', $property->model_home_address) }}"
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
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">{{ old('short_description', $property->short_description) }}</textarea>
                </div>

                <div>
                    <label for="full_description" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Full Comprehensive Description
                    </label>
                    <textarea id="full_description" name="full_description" rows="5"
                              class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]">{{ old('full_description', $property->full_description) }}</textarea>
                </div>
            </div>

            <!-- Flags & Visibility -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    5. Categorization &amp; Flags
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_preconstruction" value="1" {{ old('is_preconstruction', $property->is_preconstruction) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Pre-Construction Project</p>
                            <p class="text-[11px] text-gray-500">Show on Pre-Construction split map and catalog</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $property->is_featured) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Featured by Ethereal</p>
                            <p class="text-[11px] text-gray-500">Highlight on homepage showcase</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_mls" value="1" {{ old('is_mls', $property->is_mls) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">MLS® Listing</p>
                            <p class="text-[11px] text-gray-500">Include in MLS resale search track</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $property->is_active) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#1a2e1e] focus:ring-[#d5a94e] h-4 w-4" />
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Published / Active</p>
                            <p class="text-[11px] text-gray-500">Visible to public buyers</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Media Uploads & Existing Images -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <h2 class="font-fragment text-sm uppercase tracking-wider text-gray-900 pb-3 border-b border-gray-100">
                    6. Visual Photography &amp; Renderings
                </h2>

                <!-- Existing Images Gallery -->
                @if($property->images && $property->images->count() > 0)
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-700 mb-3">Current Images</p>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach($property->images as $img)
                                <div class="relative rounded-lg overflow-hidden border border-gray-200 aspect-[4/3] bg-gray-100 group">
                                    <img src="{{ $img->full_url }}" alt="" class="w-full h-full object-cover" />
                                    @if($img->is_primary)
                                        <span class="absolute bottom-1 left-1 bg-[#1a2e1e] text-white text-[9px] font-bold px-1.5 py-0.5 rounded">Primary</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div>
                    <label for="primary_image" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Replace Primary Hero Image
                    </label>
                    <input type="file" id="primary_image" name="primary_image" accept="image/*"
                           class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-600 focus:outline-none" />
                </div>

                <div>
                    <label for="gallery_images" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Add More Gallery Images
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
                        class="px-8 py-3 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm cursor-pointer">
                    Save Changes
                </button>
            </div>

        </form>

    </div>
</x-admin-layout>
