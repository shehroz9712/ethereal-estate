<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getPublished(int $perPage = 6): LengthAwarePaginator
    {
        return Article::published()->paginate($perPage);
    }

    public function getAll(int $perPage = 15): LengthAwarePaginator
    {
        return Article::latest()->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Article
    {
        return Article::where('slug', $slug)->first();
    }

    public function findById(int $id): ?Article
    {
        return Article::find($id);
    }

    public function create(array $data): Article
    {
        return Article::create($data);
    }

    public function update(Article $article, array $data): Article
    {
        $article->update($data);
        return $article->fresh();
    }

    public function delete(Article $article): bool
    {
        return $article->delete();
    }
}
