<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment_tittle',
        'customer_id',
        'product_id'
    ];

    public function Product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function Customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
