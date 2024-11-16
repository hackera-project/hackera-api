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
        Role::query()->updateOrCreate(['name' => 'hacker']);
        Role::query()->updateOrCreate(['name' => 'company-admin']);
        Role::query()->updateOrCreate(['name' => 'company-employee']);
    }
}
