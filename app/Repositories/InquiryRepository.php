<?php

namespace App\Repositories;

use App\Contracts\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InquiryRepository implements InquiryRepositoryInterface
{
    public function getAll(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Inquiry::with(['property', 'user']);

        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $s = $filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('first_name', 'like', "%{$s}%")
                  ->orWhere('last_name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('phone', 'like', "%{$s}%");
            });
        }

        return $query->latest()->paginate($perPage);
    }

    public function findById(int $id): ?Inquiry
    {
        return Inquiry::with(['property', 'user'])->find($id);
    }

    public function create(array $data): Inquiry
    {
        return Inquiry::create($data);
    }

    public function updateStatus(Inquiry $inquiry, string $status): bool
    {
        return $inquiry->update(['status' => $status]);
    }

    public function delete(Inquiry $inquiry): bool
    {
        return $inquiry->delete();
    }

    public function getRecent(int $limit = 5)
    {
        return Inquiry::with(['property'])->latest()->limit($limit)->get();
    }
}
