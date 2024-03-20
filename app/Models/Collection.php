<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Collection extends Model
{
    use HasFactory;
    protected $fillable=[
       'collection_name'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'collections_products', 'collection_id', 'product_id');
    }
}
