<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function getPublished(int $perPage = 6): LengthAwarePaginator;

    public function getAll(int $perPage = 15): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Article;

    public function findById(int $id): ?Article;

    public function create(array $data): Article;

    public function update(Article $article, array $data): Article;

    public function delete(Article $article): bool;
}
