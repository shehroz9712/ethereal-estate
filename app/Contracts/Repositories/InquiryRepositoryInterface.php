<?php

namespace App\Contracts\Repositories;

use App\Models\Inquiry;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InquiryRepositoryInterface
{
    public function getAll(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function findById(int $id): ?Inquiry;

    public function create(array $data): Inquiry;

    public function updateStatus(Inquiry $inquiry, string $status): bool;

    public function delete(Inquiry $inquiry): bool;

    public function getRecent(int $limit = 5);
}
