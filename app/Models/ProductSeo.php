<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSeo extends Model
{
    protected $fillable = [
        'product_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'json_ld',
        'og_image'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
