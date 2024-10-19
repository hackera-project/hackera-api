<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public const HACKER = 'hacker';
    public const COMPANY_ADMIN = 'company-admin';
    public const COMPANY_EMPLOYEE = 'company-employee';

    protected $fillable = [
        'name',
    ];
}
