<?php

namespace App\Services;

use App\Contracts\Repositories\PropertyRepositoryInterface;
use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PropertyService
{
    public function __construct(
        protected PropertyRepositoryInterface $propertyRepository
    ) {}

    public function getFeaturedProperties(int $limit = 6): Collection
    {
        return $this->propertyRepository->getFeatured($limit);
    }

    public function getPreConstructionProperties(array $filters = []): Collection
    {
        return $this->propertyRepository->getPreConstruction($filters);
    }

    public function getPaginatedProperties(array $filters = [], int $perPage = 9): LengthAwarePaginator
    {
        return $this->propertyRepository->getAll($filters, $perPage);
    }

    public function getPropertyBySlug(string $slug): ?Property
    {
        return $this->propertyRepository->findBySlug($slug);
    }

    public function formatMapMarkers(Collection $properties): array
    {
        return $properties->map(function (Property $p) {
            $primaryImg = $p->primary_image_url;
            return [
                'id' => $p->id,
                'title' => $p->title,
                'city' => $p->city,
                'price' => $p->formatted_price,
                'bedrooms' => $p->bedrooms,
                'bathrooms' => $p->bathrooms,
                'sqft' => $p->sqft,
                'lat' => (float) $p->latitude,
                'lng' => (float) $p->longitude,
                'url' => route('properties.show', $p->slug),
                'image' => $primaryImg,
            ];
        })->filter(fn ($m) => !empty($m['lat']) && !empty($m['lng']))->values()->toArray();
    }

    public function createProperty(array $data): Property
    {
        return $this->propertyRepository->create($data);
    }

    public function updateProperty(Property $property, array $data): Property
    {
        return $this->propertyRepository->update($property, $data);
    }

    public function deleteProperty(Property $property): bool
    {
        return $this->propertyRepository->delete($property);
    }
}
