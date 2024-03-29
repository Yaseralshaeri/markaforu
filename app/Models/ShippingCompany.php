<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    use HasFactory;
    protected $fillable=[
        'note',
        'company_logo',
        'shipping_coast',
        'company_name'
    ];
}
