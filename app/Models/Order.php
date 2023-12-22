<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Order extends Model
{
    use HasFactory;

    /**
     * Relationships that should always be loaded
     * 
     * @var array
     */
    protected $with = ['customer', 'products'];

    /**
     * Get the customer associated with the order
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    /**
     * Products that belong to the order
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot(['quantity', 'total']);
    }
}
