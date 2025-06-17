<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductVariantAttribute extends Pivot
{
    protected $table = 'product_variant_attribute_value';

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
