<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'base_price',
        'is_variant_based',
        'stock',
        'status',
        'thumbnail',
    ];

    protected $casts = [
        'is_variant_based' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Product has many variants
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Optional: get all attribute values used in any variant of this product (via pivot)
    public function attributeValues()
    {
        return $this->hasManyThrough(
            AttributeValue::class,
            ProductVariantAttributeValue::class,
            'product_variant_id', // Foreign key on pivot table
            'id',                 // Foreign key on AttributeValue table
            'id',                 // Local key on Product table
            'attribute_value_id'  // Local key on pivot table
        );
    }

    // Helper for total stock (sum of variant stocks if variant based)
    public function getTotalStockAttribute()
    {
        return $this->is_variant_based
            ? $this->variants()->sum('stock')
            : $this->stock;
    }

    // Helper for effective price (first variant price or base price)
    public function getEffectivePriceAttribute()
    {
        return $this->is_variant_based
            ? optional($this->variants()->first())->price
            : $this->base_price;
    }
}
