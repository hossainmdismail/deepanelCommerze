<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategorySeo extends Model
{
    protected $fillable = [
        'category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'json_ld',
        'og_image'
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'json_ld' => 'array', // also good to cast
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
