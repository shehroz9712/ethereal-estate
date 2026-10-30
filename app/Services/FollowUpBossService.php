<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FollowUpBossService
{
    protected ?string $apiKey;
    protected ?string $pixelKey;
    protected string $endpoint = 'https://api.followupboss.com/v1/events';

    public function __construct()
    {
        $this->apiKey = config('services.followupboss.api_key', env('FOLLOWUPBOSS_API_KEY'));
        $this->pixelKey = config('services.followupboss.pixel_key', env('FOLLOWUPBOSS_PIXEL_KEY'));
    }

    /**
     * Send lead event to Follow Up Boss
     */
    public function sendLeadEvent(array $leadData): bool
    {
        if (empty($this->apiKey)) {
            Log::info('[FollowUpBoss] Event queued (No API key configured in .env):', $leadData);
            return true;
        }

        try {
            $payload = [
                'source' => $leadData['source'] ?? 'Ethereal Estates Website',
                'system' => 'EtherealEstatesApp',
                'type' => $leadData['type'] ?? 'General Inquiry',
                'message' => $leadData['message'] ?? '',
                'person' => [
                    'firstName' => $leadData['first_name'] ?? '',
                    'lastName' => $leadData['last_name'] ?? '',
                    'emails' => array_filter([
                        !empty($leadData['email']) ? ['value' => $leadData['email']] : null,
                    ]),
                    'phones' => array_filter([
                        !empty($leadData['phone']) ? ['value' => $leadData['phone']] : null,
                    ]),
                ],
            ];

            if (!empty($leadData['property_title']) || !empty($leadData['property_url'])) {
                $payload['property'] = array_filter([
                    'street' => $leadData['property_address'] ?? null,
                    'city' => $leadData['property_city'] ?? null,
                    'url' => $leadData['property_url'] ?? null,
                    'code' => $leadData['property_title'] ?? null,
                ]);
            }

            $response = Http::withBasicAuth($this->apiKey, '')
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->timeout(6)
                ->post($this->endpoint, $payload);

            if ($response->successful()) {
                Log::info('[FollowUpBoss] Lead event successfully synced:', ['email' => $leadData['email'] ?? '']);
                return true;
            }

            Log::warning('[FollowUpBoss] API call returned non-success:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return false;
        } catch (\Throwable $e) {
            Log::error('[FollowUpBoss] Connection exception: ' . $e->getMessage());
            return false;
        }
    }

    public function getPixelKey(): ?string
    {
        return $this->pixelKey;
    }
}
