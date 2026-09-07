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
            $s = $filters['search'];
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%")
                  ->orWhere('address', 'like', "%{$s}%")
                  ->orWhere('short_description', 'like', "%{$s}%");
            });
        }

        if (!empty($filters['city'])) {
            $query->where('city', $filters['city']);
        }

        if (!empty($filters['type']) && $filters['type'] !== 'All' && $filters['type'] !== 'Property Type') {
            $query->where('property_type', $filters['type']);
        }

        if (!empty($filters['bedrooms']) && $filters['bedrooms'] !== 'Bedrooms') {
            $minBeds = (int) filter_var($filters['bedrooms'], FILTER_SANITIZE_NUMBER_INT);
            if ($minBeds > 0) {
                $query->where('bedrooms', '>=', $minBeds);
            }
        }

        if (!empty($filters['bathrooms']) && $filters['bathrooms'] !== 'Bathrooms') {
            $minBaths = (int) filter_var($filters['bathrooms'], FILTER_SANITIZE_NUMBER_INT);
            if ($minBaths > 0) {
                $query->where('bathrooms', '>=', $minBaths);
            }
        }

        if (!empty($filters['max_price']) && $filters['max_price'] !== 'Max Price') {
            $priceStr = strtoupper($filters['max_price']);
            $maxVal = null;
            if (str_contains($priceStr, '500K')) $maxVal = 500000;
            elseif (str_contains($priceStr, '750K')) $maxVal = 750000;
            elseif (str_contains($priceStr, '1M')) $maxVal = 1000000;
            elseif (str_contains($priceStr, '2M')) $maxVal = 2000000;

            if ($maxVal) {
                $query->where(function ($q) use ($maxVal) {
                    $q->where('price', '<=', $maxVal)
                      ->orWhereNull('price');
                });
            }
        }

        return $query;
    }
}
