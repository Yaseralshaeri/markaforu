<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    protected $table='product_images_colors';

    protected $fillable=[
        'path',
        'color_id',
        'size',
        'showed',
        'product_id',
        'created_at'
    ];
    public $timestamps=false;
protected $casts=[
    'path'=>'array',
    'size'=>'array',
    'showed' => 'boolean',
];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }


}
