<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'deadline'    => ['required', 'date'],
            'status'      => ['required', Rule::enum(ProjectStatus::class)],
            'user_id'     => ['required', Rule::exists('users','id')],
            'client_id'   => ['required', Rule::exists('clients','id')],
        ];
    }
}