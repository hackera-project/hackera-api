<?php

namespace App\Models;

use App\Models\Enums\Program\ProgramStatus;
use App\Models\Enums\Program\ProgramType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'company_id',
        'type',
        'description',
        'exclusion',
        'deadline',
        'status',
        'payments',
    ];

    protected function casts()
    {
        return [
            'deadline' => 'datetime',
            'payments' => 'array',
            'type' => ProgramType::class,
            'status' => ProgramStatus::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    public function emptyPayments()
    {
        return [
            'enable' => false,
            'low_severity' => ['min' => 0, 'max' => 0],
            'medium_severity' => ['min' => 0, 'max' => 0],
            'high_severity' => ['min' => 0, 'max' => 0],
            'critical_severity' => ['min' => 0, 'max' => 0],
        ];
    }
}
