<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\PropertyRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function __construct(
        protected PropertyRepositoryInterface $propertyRepo
    ) {}

    public function index(Request $request): View
    {
        $filters = $request->only(['search', 'city', 'type', 'status']);
        $properties = $this->propertyRepo->getAll($filters, 12);

        return view('admin.properties.index', compact('properties', 'filters'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('admin.properties.create', compact('categories', 'locations'));
    }

    public function store(StorePropertyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'] . '-' . $data['city']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_preconstruction'] = $request->boolean('is_preconstruction');
        $data['is_mls'] = $request->boolean('is_mls');
        $data['is_active'] = $request->boolean('is_active', true);

        $property = $this->propertyRepo->create($data);

        // Handle primary image upload
        if ($request->hasFile('primary_image')) {
            $path = $request->file('primary_image')->store('assets/images/properties', 'public');
            PropertyImage::create([
                'property_id' => $property->id,
                'image_url' => 'storage/' . $path,
                'is_primary' => true,
                'sort_order' => 0,
            ]);
        }

        // Handle gallery image uploads
        if ($request->hasFile('gallery_images')) {
            $sort = 1;
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('assets/images/properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => 'storage/' . $path,
                    'is_primary' => false,
                    'sort_order' => $sort++,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', "Property '{$property->title}' was successfully added.");
    }

    public function edit(Property $property): View
    {
        $categories = Category::all();
        $locations = Location::all();
        $property->load(['images', 'floorPlans']);

        return view('admin.properties.edit', compact('property', 'categories', 'locations'));
    }

    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_preconstruction'] = $request->boolean('is_preconstruction');
        $data['is_mls'] = $request->boolean('is_mls');
        $data['is_active'] = $request->boolean('is_active');

        $this->propertyRepo->update($property, $data);

        if ($request->hasFile('primary_image')) {
            $path = $request->file('primary_image')->store('assets/images/properties', 'public');
            // Unset old primary
            PropertyImage::where('property_id', $property->id)->update(['is_primary' => false]);
            PropertyImage::create([
                'property_id' => $property->id,
                'image_url' => 'storage/' . $path,
                'is_primary' => true,
                'sort_order' => 0,
            ]);
        }

        if ($request->hasFile('gallery_images')) {
            $sort = PropertyImage::where('property_id', $property->id)->max('sort_order') ?? 0;
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('assets/images/properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => 'storage/' . $path,
                    'is_primary' => false,
                    'sort_order' => ++$sort,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', "Property '{$property->title}' was updated successfully.");
    }

    public function destroy(Property $property): RedirectResponse
    {
        $title = $property->title;
        $this->propertyRepo->delete($property);

        return redirect()->route('admin.properties.index')->with('success', "Property '{$title}' was deleted successfully.");
    }
}
