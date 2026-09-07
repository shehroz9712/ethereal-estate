<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Contracts\Repositories\PropertyRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected PropertyRepositoryInterface $propertyRepo,
        protected ArticleRepositoryInterface $articleRepo
    ) {}

    public function index(): View
    {
        $featuredProperties = $this->propertyRepo->getFeatured(4);
        $preConstructionProperties = $this->propertyRepo->getPreConstruction();
        $latestArticles = $this->articleRepo->getPublished(3);

        return view('pages.home', compact(
            'featuredProperties',
            'preConstructionProperties',
            'latestArticles'
        ));
    }
}
