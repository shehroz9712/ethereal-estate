<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'status' => 'required|string|in:for_sale,selling_fast,sold_out,upcoming',
            'property_type' => 'required|string|max:50',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|numeric|min:0',
            'garage' => 'required|integer|min:0',
            'sqft' => 'required|integer|min:0',
            'balcony' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'feature_line' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'developer' => 'nullable|string|max:150',
            'model_home_address' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'is_preconstruction' => 'nullable|boolean',
            'is_mls' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'primary_image' => 'nullable|image|max:10240',
            'gallery_images.*' => 'nullable|image|max:10240',
        ];
    }
}
