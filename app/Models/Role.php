<?php

namespace App\Models;

use App\Models\Enums\Role\Role as AppRole;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function casts()
    {
        return [
            'name' => AppRole::class,
        ];
    }
}
