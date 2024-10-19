<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Role::query()->create(['name' => 'hacker']);
        Role::query()->create(['name' => 'company-admin']);
        Role::query()->create(['name' => 'company-employee']);
    }
}
