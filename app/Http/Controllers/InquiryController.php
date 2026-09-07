<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\StoreJoinRequest;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\StoreRegistrationRequest;
use App\Services\InquiryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    public function __construct(
        protected InquiryService $inquiryService
    ) {}

    public function submitContact(StoreInquiryRequest $request): JsonResponse|RedirectResponse
    {
        $userId = auth()->id();
        $inquiry = $this->inquiryService->handleContactSubmission($request->validated(), $userId);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for reaching out. An Ethereal Estates advisor will contact you within 24 hours.',
            ]);
        }

        return back()->with('success', 'Thank you for reaching out. An Ethereal Estates advisor will contact you within 24 hours.');
    }

    public function submitRegistration(StoreRegistrationRequest $request): JsonResponse|RedirectResponse
    {
        $userId = auth()->id();
        $inquiry = $this->inquiryService->handleVipRegistration($request->validated(), $userId);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration confirmed! Floor plans, VIP pricing, and project updates will be dispatched promptly.',
            ]);
        }

        return back()->with('success', 'Registration confirmed! Floor plans, VIP pricing, and project updates will be dispatched promptly.');
    }

    public function submitJoin(StoreJoinRequest $request): JsonResponse|RedirectResponse
    {
        $userId = auth()->id();
        $inquiry = $this->inquiryService->handleJoinApplication($request->validated(), $userId);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your application has been received. Our brokerage management team looks forward to connecting with you.',
            ]);
        }

        return back()->with('success', 'Your application has been received. Our brokerage management team looks forward to connecting with you.');
    }

    public function subscribeNewsletter(StoreNewsletterRequest $request): JsonResponse|RedirectResponse
    {
        $this->inquiryService->handleNewsletterSubscription($request->validated());

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'You have been subscribed to exclusive updates and private market insights from Ethereal Estates.',
            ]);
        }

        return back()->with('success', 'You have been subscribed to exclusive updates and private market insights from Ethereal Estates.');
    }
}
