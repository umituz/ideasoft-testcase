<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
        static::observe(ProductObserver::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
