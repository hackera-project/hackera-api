<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',

        'website',
        'social_media',
        'company_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'social_media' => 'array',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $with = ['roles'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
