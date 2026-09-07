<?php

namespace App\Contracts\Repositories;

use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface
{
    public function getAll(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function getFeatured(int $limit = 6): Collection;

    public function getPreConstruction(array $filters = []): Collection;

    public function findBySlug(string $slug): ?Property;

    public function findById(int $id): ?Property;

    public function create(array $data): Property;

    public function update(Property $property, array $data): Property;

    public function delete(Property $property): bool;

    public function getLocationsList(): array;
}
