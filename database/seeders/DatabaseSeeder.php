<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Program;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $users = User::factory()->count(20)->create();

        $users->each(fn ($u) => $u->roles()->attach([1]));

        $users = User::factory()->count(10)->create(['company_id' => Company::factory()]);

        $users->each(fn ($u) => $u->roles()->attach([2]));

        Program::factory()->count(30)->create();
    }
}
