<?php

namespace App\Repositories;

use App\Contracts\Repositories\PropertyRepositoryInterface;
use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function getAll(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return Property::with(['images', 'category', 'location'])
            ->filter($filters)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getFeatured(int $limit = 6): Collection
    {
        return Property::with(['images', 'location'])
            ->active()
            ->featured()
            ->orderBy('sort_order')
            ->limit($limit)
            ->get();
    }

    public function getPreConstruction(array $filters = []): Collection
    {
        return Property::with(['images', 'location'])
            ->active()
            ->preconstruction()
            ->filter($filters)
            ->orderBy('sort_order')
            ->get();
    }

    public function findBySlug(string $slug): ?Property
    {
        return Property::with(['images', 'floorPlans', 'location', 'category'])
            ->where('slug', $slug)
            ->first();
    }

    public function findById(int $id): ?Property
    {
        return Property::with(['images', 'floorPlans', 'location', 'category'])->find($id);
    }

    public function create(array $data): Property
    {
        return Property::create($data);
    }

    public function update(Property $property, array $data): Property
    {
        $property->update($data);
        return $property->fresh(['images', 'floorPlans']);
    }

    public function delete(Property $property): bool
    {
        return $property->delete();
    }

    public function getLocationsList(): array
    {
        return Property::active()
            ->select('city')
            ->distinct()
            ->pluck('city')
            ->toArray();
    }
}
