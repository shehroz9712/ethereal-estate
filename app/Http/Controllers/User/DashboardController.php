<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardService $dashboardService
    ) {}

    public function index(): View
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $metrics = $this->dashboardService->getUserMetrics($user);

        return view('user.dashboard', compact('user', 'metrics'));
    }

    public function savedProperties(): View
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $savedProperties = $user->savedProperties()->with(['images', 'location'])->paginate(9);

        return view('user.saved-properties', compact('savedProperties'));
    }
}
