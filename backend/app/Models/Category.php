<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
        static::observe(CategoryObserver::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
