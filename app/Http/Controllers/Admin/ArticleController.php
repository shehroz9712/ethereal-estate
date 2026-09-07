<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleRepositoryInterface $articleRepo
    ) {}

    public function index(): View
    {
        $articles = $this->articleRepo->getAll(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_name'] = auth()->user()->name ?? 'Ethereal Advisory Team';
        $validated['is_published'] = $request->boolean('is_published', true);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('assets/images/articles', 'public');
            $validated['image_url'] = 'storage/' . $path;
        }

        $this->articleRepo->create($validated);

        return back()->with('success', 'Editorial article published successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->articleRepo->delete($article);
        return back()->with('success', 'Article deleted.');
    }
}
