<?php

namespace Database\Factories;

use App\Models\Enums\Asset\AssetType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => AssetType::Url,
            'asset_value' => fake()->url(),
            'max_severity' => (fake()->randomDigit() % 4) + 1
        ];
    }
}
