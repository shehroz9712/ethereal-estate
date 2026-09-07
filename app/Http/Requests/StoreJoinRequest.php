<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJoinRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'current_brokerage' => 'nullable|string|max:150',
            'years_experience' => 'nullable|string|max:50',
            'experience_summary' => 'nullable|string|max:2000',
        ];
    }
}
