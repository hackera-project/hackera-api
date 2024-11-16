<?php

namespace App\Http\Requests\V1\User;

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
            'type' => ['required', 'in:general,social'],
            'name' => ['required_if:type,general', 'string', 'max:64'],
            'username' => ['required_if:type,general', 'string', 'max:64'],
            'website' => ['required_if:type,general', 'string', 'max:64'],
            'logoFile' => ['nullable', 'file', 'mimetypes:image/*'],
            'social_media' => ['nullable', 'array'],
            'social_media.x' => ['nullable', 'string', 'max:255'],
            'social_media.linkedin' => ['nullable', 'string', 'max:255'],
            'social_media.github' => ['nullable', 'string', 'max:255'],
            'social_media.gitlab' => ['nullable', 'string', 'max:255'],
        ];
    }
}
