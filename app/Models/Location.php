<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'slug',
        'province',
        'region',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public static function booted()
    {
        static::creating(function ($location) {
            if (empty($location->slug)) {
                $location->slug = Str::slug($location->city);
            }
        });
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
