<?php

namespace App\Http\Controllers;

use App\Services\PropertyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PreConstructionController extends Controller
{
    public function __construct(
        protected PropertyService $propertyService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->only([
            'search',
            'city',
            'type',
            'bedrooms',
            'bathrooms',
            'max_price',
        ]);

        $properties = $this->propertyService->getPreConstructionProperties($filters);
        $mapMarkers = $this->propertyService->formatMapMarkers($properties);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'count' => $properties->count(),
                'markers' => $mapMarkers,
                'html' => view('components.precon-list-partial', compact('properties'))->render(),
            ]);
        }

        return view('pages.pre-construction', compact('properties', 'mapMarkers', 'filters'));
    }
}
