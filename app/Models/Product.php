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
        'thumbnail'
    ];

    protected $casts = [
        'is_variant_based' => 'boolean',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function seo(): HasOne
    {
        return $this->hasOne(ProductSeo::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function attributes(): HasManyThrough
    // {
    //     return $this->hasManyThrough(
    //         Attribute::class,
    //         ProductVariantAttributeValue::class,
    //         'product_variant_id',
    //         'id',
    //         'id',
    //         'attribute_id'
    //     )->distinct();
    // }
    // In ProductVariant model
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, 'product_variant_attribute_value')
            ->withPivot('attribute_value_id')
            ->using(ProductVariantAttribute::class); // Only if you created the custom pivot model
    }
}
