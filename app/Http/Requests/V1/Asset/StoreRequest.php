<?php

namespace App\Http\Requests\V1\Asset;

use App\Models\Enums\Asset\AssetType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'type' => ['required', 'string', Rule::in(AssetType::cases())],
            'asset_value' => ['required', 'string', 'max:1024'],
            'max_severity' => ['required', 'numeric', 'max:4'],
        ];
    }
}
