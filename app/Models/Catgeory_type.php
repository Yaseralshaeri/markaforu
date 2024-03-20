<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Catgeory_type extends Model
{
    use HasFactory;
    protected $table='categories_types';
    protected $primaryKey='id';

    protected $fillable=[
        'category_id',
        'type_id'
    ];



 /*   public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }*/



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }



}
