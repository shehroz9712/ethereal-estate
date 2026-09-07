<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public bool $navDark = false,
        public ?string $activePage = null,
        public ?string $bodyClass = null,
        public bool $hideFooter = false
    ) {}

    public function render(): View
    {
        return view('layouts.app');
    }
}
