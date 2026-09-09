<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function __construct(
        protected PropertyService $propertyService
    ) {}

    public function index(Request $request): View
    {
        $properties = Property::with(['images', 'location'])
            ->active()
            ->get()
            ->sortBy(function ($p) {
                $order = [
                    'orchard-south' => 1,
                    'mirra-townhomes' => 2,
                    'chateau-9' => 3,
                    'orchard-west' => 4,
                    'highland-reserve' => 5,
                    'ellia-at-unity' => 6,
                    'bayview-trail' => 7,
                    'eversley-estates' => 8,
                ];
                return $order[$p->slug] ?? ($p->sort_order + 10);
            })->values();

        return view('pages.properties.index', compact('properties'));
    }

    public function show(string $slug): View
    {
        $property = $this->propertyService->getPropertyBySlug($slug);

        if (!$property) {
            abort(404, 'Property listing not found.');
        }

        $similarProperties = Property::active()
            ->where('id', '!=', $property->id)
            ->where('city', $property->city)
            ->limit(3)
            ->get();

        if ($similarProperties->isEmpty()) {
            $similarProperties = Property::active()
                ->where('id', '!=', $property->id)
                ->limit(3)
                ->get();
        }

        $isSaved = auth()->check()
            ? auth()->user()->savedProperties()->where('property_id', $property->id)->exists()
            : false;

        return view('pages.properties.show', compact('property', 'similarProperties', 'isSaved'));
    }

    public function toggleFavorite(Property $property): JsonResponse|RedirectResponse
    {
        if (!auth()->check()) {
            if (request()->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Please sign in to save properties.'], 401);
            }
            return redirect()->route('login')->with('info', 'Please sign in to save properties.');
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();
        $attached = $user->savedProperties()->toggle($property->id);
        $saved = count($attached['attached']) > 0;

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'saved' => $saved,
                'message' => $saved ? 'Property saved to your collection.' : 'Property removed from saved collection.',
            ]);
        }

        return back()->with('success', $saved ? 'Property saved.' : 'Property removed from saved list.');
    }
}
