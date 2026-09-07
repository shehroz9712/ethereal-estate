<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleRepositoryInterface $articleRepo
    ) {}

    public function index(Request $request): View
    {
        $articles = $this->articleRepo->getPublished(6);
        return view('pages.news.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = $this->articleRepo->findBySlug($slug);

        if (!$article) {
            abort(404, 'Editorial article not found.');
        }

        $prevArticle = Article::published()
            ->where('id', '<', $article->id)
            ->first();

        $nextArticle = Article::published()
            ->where('id', '>', $article->id)
            ->first();

        return view('pages.news.show', compact('article', 'prevArticle', 'nextArticle'));
    }
}
