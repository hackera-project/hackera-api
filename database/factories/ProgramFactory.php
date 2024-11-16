<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Enums\Program\ProgramType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = Company::query()->get()->random();
        $user = $company->users()->first();

        return [
            'title' => fake()->word(),
            'company_id' => $company->id,
            'user_id' => $user->id,
            'type' => ProgramType::BBP,
            'description' => fake()->text(),
            'exclusion' => fake()->text(),
            'deadline' => now()->addMonth(),
            'payments' => [
                "enable" => true,
                "low_severity" => ["max"=> "100", "min"=> "0"],
                "high_severity"=> ["max"=> "2000", "min"=> "500"],
                "medium_severity"=> ["max"=> "500", "min"=> "100"],
                "critical_severity"=> ["max"=> "4000", "min"=> "2000"],
            ],
        ];
    }
}
