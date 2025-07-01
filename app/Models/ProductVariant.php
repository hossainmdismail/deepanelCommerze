<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'image',
        'attribute_snapshot',
    ];

    protected $casts = [
        'attribute_snapshot' => 'array',
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Pivot relation: variant has many attribute values, with attribute_id pivot
public function attributeValues()
{
    return $this->belongsToMany(
        \App\Models\AttributeValue::class,
        'product_variant_attribute_values',
        'product_variant_id',
        'attribute_value_id'
    )->withPivot('attribute_id');
}



    // Sync attributes from form input
    public function saveAttributes(array $attributesData)
    {
        $syncData = [];
        foreach ($attributesData as $attr) {
            $syncData[$attr['attribute_value_id']] = ['attribute_id' => $attr['attribute_id']];
        }
        $this->attributeValues()->sync($syncData);
    }
}
