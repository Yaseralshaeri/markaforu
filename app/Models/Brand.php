<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=[
      'brand_name',
       'brand_logo',
    ];

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_brands', 'brand_id', 'category_id');
    }
}
