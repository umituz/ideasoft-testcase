<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends BaseModel
{
    protected $fillable = [
        'name',
        'since',
        'revenue'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
        static::observe(CustomerObserver::class);
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
