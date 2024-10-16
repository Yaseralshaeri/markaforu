<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    public function cartItems():HasMany
    {
        return $this->hasMany(Cart_item::class);
    }

    public function shippingCompany():BelongsTo
    {
        return $this->belongsTo(ShippingCompany::class);
    }
}
