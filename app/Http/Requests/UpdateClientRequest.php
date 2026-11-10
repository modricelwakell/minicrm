<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contact_name'         => ['required', 'string', 'max:255'],
            'contact_email'        => ['nullable', 'email', 'max:255'],
            'contact_phone_number' => ['nullable', 'string', 'max:20'],
            'company_name'         => ['required', 'string', 'max:255'],
            'company_city'         => ['nullable', 'string', 'max:255'],
        ];
    }
}
