<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table='discount_codes';
    protected $fillable=[
      'discount_code',
      'discount_percentage'
    ];
}
