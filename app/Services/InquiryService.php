<?php

namespace App\Services;

use App\Contracts\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use App\Models\NewsletterSubscriber;

class InquiryService
{
    public function __construct(
        protected InquiryRepositoryInterface $inquiryRepository,
        protected FollowUpBossService $fubService
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

        $inquiry = $this->inquiryRepository->create($payload);

        $this->fubService->sendLeadEvent([
            'source' => 'Website Contact Page',
            'type' => 'Contact Inquiry',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? '',
            'email' => $data['email'],
            'phone' => $data['phone'] ?? '',
            'message' => $data['message'] ?? 'General inquiry via contact page.',
        ]);

        return $inquiry;
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

        $inquiry = $this->inquiryRepository->create($payload);

        $propTitle = '';
        $propUrl = '';
        if (!empty($data['property_id'])) {
            $prop = \App\Models\Property::find($data['property_id']);
            if ($prop) {
                $propTitle = $prop->title;
                $propUrl = route('properties.show', $prop->slug);
            }
        }

        $this->fubService->sendLeadEvent([
            'source' => 'VIP Registration / Floor Plan Unlock',
            'type' => 'VIP Allocation Request',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? '',
            'email' => $data['email'],
            'phone' => $data['phone'] ?? '',
            'message' => $data['notes'] ?? 'Requested floor plans and VIP project access.',
            'property_title' => $propTitle,
            'property_url' => $propUrl,
        ]);

        return $inquiry;
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

        $inquiry = $this->inquiryRepository->create($payload);

        $this->fubService->sendLeadEvent([
            'source' => 'Join Ethereal Application',
            'type' => 'Agent Recruitment Inquiry',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? '',
            'email' => $data['email'],
            'phone' => $data['phone'] ?? '',
            'message' => ($data['experience_summary'] ?? '') . ' | License: ' . ($data['license_number'] ?? 'N/A') . ' | Brokerage: ' . ($data['current_brokerage'] ?? 'N/A'),
        ]);

        return $inquiry;
    }

    public function handleNewsletterSubscription(array $data): NewsletterSubscriber
    {
        $sub = NewsletterSubscriber::updateOrCreate(
            ['email' => $data['email']],
            [
                'first_name' => $data['first_name'] ?? null,
                'last_name' => $data['last_name'] ?? null,
                'is_active' => true,
            ]
        );

        $this->fubService->sendLeadEvent([
            'source' => 'Private Client List Subscription',
            'type' => 'Platinum Access Registration',
            'first_name' => $data['first_name'] ?? '',
            'last_name' => $data['last_name'] ?? '',
            'email' => $data['email'],
            'message' => 'Subscribed to Ethereal Estates private client updates.',
        ]);

        return $sub;
    }
}
