<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductVariantAttributeValue extends Pivot
{
    protected $table = 'product_variant_attribute_values';
}
