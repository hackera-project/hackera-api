<?php

namespace App\Http\Requests\V1\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'status' => ['required', 'string',],
            'severity' => ['required'],
            'payment' => ['nullable', 'string'],
            'reviewer_comment' => ['nullable', 'string', 'max:4000'],
        ];
    }
}
