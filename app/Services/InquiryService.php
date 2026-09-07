<?php

namespace App\Services;

use App\Contracts\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use App\Models\NewsletterSubscriber;

class InquiryService
{
    public function __construct(
        protected InquiryRepositoryInterface $inquiryRepository
    ) {}

    public function handleContactSubmission(array $data, ?int $userId = null): Inquiry
    {
        $payload = [
            'user_id' => $userId,
            'type' => 'contact',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'postal_code' => $data['postal_code'] ?? null,
            'message' => $data['message'] ?? null,
            'status' => 'new',
        ];

        return $this->inquiryRepository->create($payload);
    }

    public function handleVipRegistration(array $data, ?int $userId = null): Inquiry
    {
        $payload = [
            'user_id' => $userId,
            'property_id' => $data['property_id'] ?? null,
            'type' => 'vip_registration',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'message' => $data['notes'] ?? 'Requested floor plans, pricing, and VIP access.',
            'status' => 'new',
        ];

        return $this->inquiryRepository->create($payload);
    }

    public function handleJoinApplication(array $data, ?int $userId = null): Inquiry
    {
        $payload = [
            'user_id' => $userId,
            'type' => 'join_realtor',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'message' => $data['experience_summary'] ?? 'Realtor career application submitted.',
            'extra_data' => [
                'license_number' => $data['license_number'] ?? null,
                'current_brokerage' => $data['current_brokerage'] ?? null,
                'years_experience' => $data['years_experience'] ?? null,
            ],
            'status' => 'new',
        ];

        return $this->inquiryRepository->create($payload);
    }

    public function handleNewsletterSubscription(array $data): NewsletterSubscriber
    {
        return NewsletterSubscriber::updateOrCreate(
            ['email' => $data['email']],
            [
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'is_active' => true,
            ]
        );
    }
}
