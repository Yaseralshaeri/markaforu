<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable=[
        'type_name',
    ];
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_types', 'type_id', 'category_id');
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
