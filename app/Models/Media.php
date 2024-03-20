<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory;

    protected $fillable=[
        'path',
        'media_name',
        'show_in',
        'media_description',
        'mediable_type',

    ];
    protected $casts = [
        'path' => 'array',
    ];
    protected function mediableType(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) =>Str::of($value)
                ->remove('App\Models\\')
                ->lower()
        );
    }
    public $timestamps=false;

    /**
     * Get the parent commentable model (post or video).
     */
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

}
