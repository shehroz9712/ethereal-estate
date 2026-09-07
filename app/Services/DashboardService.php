<?php

namespace App\Services;

use App\Contracts\Repositories\InquiryRepositoryInterface;
use App\Contracts\Repositories\PropertyRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\Article;
use App\Models\Inquiry;
use App\Models\NewsletterSubscriber;
use App\Models\Property;
use App\Models\User;

class DashboardService
{
    public function __construct(
        protected PropertyRepositoryInterface $propertyRepo,
        protected UserRepositoryInterface $userRepo,
        protected InquiryRepositoryInterface $inquiryRepo
    ) {}

    public function getAdminMetrics(): array
    {
        return [
            'total_properties' => Property::count(),
            'active_properties' => Property::where('is_active', true)->count(),
            'preconstruction_count' => Property::where('is_preconstruction', true)->count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'total_subscribers' => NewsletterSubscriber::count(),
            'total_articles' => Article::count(),
            'recent_inquiries' => Inquiry::with(['property', 'user'])->latest()->limit(8)->get(),
            'recent_properties' => Property::with('images')->latest()->limit(5)->get(),
        ];
    }

    public function getUserMetrics(User $user): array
    {
        return [
            'saved_properties' => $user->savedProperties()->with('images')->get(),
            'inquiries' => $user->inquiries()->with('property')->latest()->get(),
        ];
    }
}
