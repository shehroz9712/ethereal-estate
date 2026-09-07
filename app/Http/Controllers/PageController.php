<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function ourStory(): View
    {
        return view('pages.our-story');
    }

    public function genius(): View
    {
        return view('pages.genius');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function rebateCalculator(): View
    {
        return view('pages.rebate-calculator');
    }

    public function joinEthereal(): View
    {
        return view('pages.join-ethereal');
    }
}
