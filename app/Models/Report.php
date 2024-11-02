<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enums\Report\ReportStatus;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'asset_id',
        'hacker_id',

        'status',
        'title',
        'description',
        'reproduce_steps',
        'severity',
        'cve',
        'cwe',
        'payment',
    ];

    public function casts()
    {
        return [
            'status' => ReportStatus::class,
        ];
    }

    public function hacker()
    {
        return $this->belongsTo(User::class, 'hacker_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(ReportFeedback::class);
    }
}
