<?php

namespace App\Models;

use App\Models\Enums\Asset\AssetType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'type',
        'asset_value',
        'max_severity',
    ];

    public function casts(): array
    {
        return [
            'type' => AssetType::class,
        ];
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo();
    }
}
