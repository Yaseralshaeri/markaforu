<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_name',
    ];


    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class,'products_categories','category_id','product_id');
    }

    public function types():BelongsToMany
    {
        return $this->belongsToMany(Type::class,'categories_types','category_id','type_id')->withPivotValue('status');
    }


    public function brands():BelongsToMany
    {
        return $this->belongsToMany(Brand::class,'category_brands','category_id','brand_id');
    }
}
