<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    protected $fillable = ['name', 'slug'];

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function productVariants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class, 'product_variant_attribute_value');
    }
}
