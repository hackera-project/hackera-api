<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public const TYPE_BBP = 'bbp';
    public const TYPE_VDP = 'vdp';
    public const TYPE_PRIVATE = 'private';
    public const TYPE_CAMPAIGN = 'campaign';

    public const STATUS_ACTIVE = 'active';
    public const STATUS_DEACTIVE = 'deactive';
    public const STATUS_REVIEW = 'review';

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
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(User::class);
    }

    public function assets()
    {
        return $this->belongsToMany(Asset::class);
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
