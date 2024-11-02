<?php

namespace App\Http\Requests\V1\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'program_id' => ['required', 'numeric', 'exists:programs,id'],
            'asset_id' => ['required', 'numeric', 'exists:assets,id'],
            'title' => ['required', 'string', 'max:128'],
            'description' => ['required', 'string', 'max:8000'],
            'reproduce_steps' => ['required', 'string', 'max:8000'],
            'severity' => ['required'],
            'cve' => ['required'],
            'cwe' => ['required'],
        ];
    }
}
