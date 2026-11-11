<?php

namespace App\Http\Requests;

use App\Enums\Enum\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'deadline' => ['required', 'date'],
            'status' => ['required', Rule::enum(TaskStatus::class)],

            'user_id' => [
                'required',
                Rule::exists('users', 'id'),
            ],

            'client_id' => [
                'required',
                Rule::exists('clients', 'id'),
            ],

            'project_id' => [
                'required',
                Rule::exists('projects', 'id')
                    ->where('client_id', $this->client_id),
            ],
        ];
    }
}
