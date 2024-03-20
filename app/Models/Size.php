<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Size extends Model
{
    use HasFactory;

    protected $fillable=[
      'size'
    ];
    public $timestamps=false;

     public function products(): BelongsToMany
   {
       return $this->belongsToMany(Product::class, 'product_sizes', 'size_id', 'product_id');
   }
}
