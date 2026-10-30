<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'location_id',
        'city',
        'address',
        'price',
        'price_label',
        'status',
        'property_type',
        'bedrooms',
        'bathrooms',
        'garage',
        'sqft',
        'balcony',
        'short_description',
        'full_description',
        'feature_line',
        'specifications',
        'latitude',
        'longitude',
        'developer',
        'model_home_address',
        'sales_centre_phone',
        'completion_year',
        'is_featured',
        'is_preconstruction',
        'is_mls',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'bathrooms' => 'float',
            'specifications' => 'array',
            'latitude' => 'float',
            'longitude' => 'float',
            'is_featured' => 'boolean',
            'is_preconstruction' => 'boolean',
            'is_mls' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public static function booted()
    {
        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title . '-' . $property->city);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(PropertyImage::class)->where('is_primary', true);
    }

    public function floorPlans(): HasMany
    {
        return $this->hasMany(FloorPlan::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved_properties')->withTimestamps();
    }

    public function getFormattedPriceAttribute(): string
    {
        if (!empty($this->price_label)) {
            return $this->price_label;
        }
        if ($this->price) {
            return '$' . number_format($this->price, 0);
        }
        return 'Price Upon Request';
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $primary = $this->images->firstWhere('is_primary', true) ?? $this->images->first();
        if ($primary && $primary->image_url) {
            return str_starts_with($primary->image_url, 'http')
                ? $primary->image_url
                : asset($primary->image_url);
        }
        return asset('assets/images/prop-orchard-south.jpg');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopePreconstruction(Builder $query): Builder
    {
        return $query->where('is_preconstruction', true);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        if (!empty($filters['search'])) {
            $s = trim($filters['search']);
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%")
                  ->orWhere('address', 'like', "%{$s}%")
                  ->orWhere('developer', 'like', "%{$s}%")
                  ->orWhere('short_description', 'like', "%{$s}%")
                  ->orWhere('full_description', 'like', "%{$s}%");
            });
        }

        if (!empty($filters['city'])) {
            $query->where('city', $filters['city']);
        }

        $type = $filters['type'] ?? $filters['house_type'] ?? null;
        if (!empty($type) && !in_array(strtolower($type), ['all', 'all house types', 'property type', 'house type'])) {
            $query->where('property_type', 'like', "%{$type}%");
        }

        if (!empty($filters['bedrooms']) && !in_array(strtolower($filters['bedrooms']), ['bedrooms', 'all'])) {
            $minBeds = (int) filter_var($filters['bedrooms'], FILTER_SANITIZE_NUMBER_INT);
            if ($minBeds > 0) {
                $query->where('bedrooms', '>=', $minBeds);
            }
        }

        if (!empty($filters['bathrooms']) && !in_array(strtolower($filters['bathrooms']), ['bathrooms', 'all'])) {
            $minBaths = (int) filter_var($filters['bathrooms'], FILTER_SANITIZE_NUMBER_INT);
            if ($minBaths > 0) {
                $query->where('bathrooms', '>=', $minBaths);
            }
        }

        $priceRange = $filters['price_range'] ?? $filters['max_price'] ?? null;
        if (!empty($priceRange) && !in_array(strtolower($priceRange), ['price range', 'max price', 'any', 'all'])) {
            $pStr = strtoupper($priceRange);
            if (str_contains($pStr, '-') || str_contains($pStr, 'TO') || str_contains($pStr, '–')) {
                // e.g. "$750K - $1M" or "750000-1000000"
                $parts = preg_split('/[\-–]|TO/i', $pStr);
                if (count($parts) === 2) {
                    $min = $this->parsePriceValue(trim($parts[0]));
                    $max = $this->parsePriceValue(trim($parts[1]));
                    if ($min !== null && $max !== null) {
                        $query->whereBetween('price', [$min, $max]);
                    } elseif ($min !== null) {
                        $query->where('price', '>=', $min);
                    } elseif ($max !== null) {
                        $query->where('price', '<=', $max);
                    }
                }
            } elseif (str_contains($pStr, 'UNDER') || str_contains($pStr, '<')) {
                $max = $this->parsePriceValue($pStr);
                if ($max !== null) {
                    $query->where(function ($q) use ($max) {
                        $q->where('price', '<=', $max)->orWhereNull('price');
                    });
                }
            } elseif (str_contains($pStr, '+') || str_contains($pStr, 'OVER') || str_contains($pStr, '>')) {
                $min = $this->parsePriceValue($pStr);
                if ($min !== null) {
                    $query->where('price', '>=', $min);
                }
            } else {
                $val = $this->parsePriceValue($pStr);
                if ($val !== null) {
                    $query->where('price', '<=', $val);
                }
            }
        }

        return $query;
    }

    protected function parsePriceValue(string $str): ?float
    {
        $str = strtoupper(str_replace(['$', ',', ' '], '', $str));
        if (str_contains($str, 'M')) {
            $num = (float) filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            return $num * 1000000;
        }
        if (str_contains($str, 'K')) {
            $num = (float) filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            return $num * 1000;
        }
        $digits = (float) preg_replace('/[^0-9.]/', '', $str);
        return $digits > 0 ? $digits : null;
    }
}
