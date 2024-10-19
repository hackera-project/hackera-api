<?php

namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'username' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'max:64', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'role' => ['required', 'in:hacker,company-admin'],
            'company_id' => ['nullable', 'numeric', 'exists:companies,id'],
        ];
    }
}
