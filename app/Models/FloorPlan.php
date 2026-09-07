<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FloorPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'lot_collection',
        'elevation',
        'name',
        'beds',
        'baths',
        'sqft',
        'description',
        'image_url',
    ];

    protected function casts(): array
    {
        return [
            'beds' => 'integer',
            'baths' => 'float',
            'sqft' => 'integer',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
