<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends BaseModel
{
    protected $fillable = [
        'customer_id',
        'total',
        'items'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
        static::observe(OrderObserver::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
