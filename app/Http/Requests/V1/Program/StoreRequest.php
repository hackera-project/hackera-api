<?php

namespace App\Http\Requests\V1\Program;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'form_type' => ['required', 'string', 'max:255'],
            'title' => [Rule::requiredIf(fn () => $this->form_type === 'create'), 'string', 'max:255'],
            'deadline' => ['nullable', 'datetime'],
            'description' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
            'exclusion' => ['nullable', 'string'],
            'payments' => ['nullable', 'array'],
        ];
    }
}
