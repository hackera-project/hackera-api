<?php

namespace App\Models\Enums\Role;

enum Role: string
{
    case Hacker = 'hacker';
    case CompanyAdmin = 'company-admin';
    case CompanyEmployee = 'company-employee';
}
