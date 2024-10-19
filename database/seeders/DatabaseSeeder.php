<?php

namespace Database\Seeders;

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

        $user = User::query()->create([
            'name' => 'Hacker',
            'username' => 'True Hacker',
            'email' => 'hacker@gmail.com',
            'password' => 'password',
        ]);

        $user->roles()->attach([1]);

        $user = User::query()->create([
            'name' => 'Company Admin',
            'username' => 'companyAdmin',
            'email' => 'company.admin@gmail.com',
            'password' => 'password',
        ]);

        $user->roles()->attach([2]);
    }
}
