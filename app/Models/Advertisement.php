<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable=[
        'ads_type',
        'has_products',
        'ads_link',
        'ads_exp',
        'ads_start',
        'ads_name',
        'note'
    ];

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'products_ads','advertisement_id','product_id');
    }
}
