<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;


    protected $fillable=[
        'category_id',
        'product_name',
        'brand_id',
        //'institution_id',
        //'type_id',
        'old_price',
        'new_price',
        'quantity',
        'tags',
        'description',
        'keyword'
    ];

    protected $casts = [
        'tags' => 'array',
    ];


    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'products_categories','product_id','category_id');
    }
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class,'collections_products','product_id','collection_id');
    }
    public function advertisements(): BelongsToMany
    {
        return $this->belongsToMany(Advertisement::class,'products_ads','product_id','advertisement_id');
    }
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }
    public function type():BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


   /* protected function userId(): Attribute
    {
        return Attribute::make(
            set: \Auth::user()->id,
        );
    }*/
    /**
     * The Model __construct to set user type to a customer when insert data using customer Resource form.
     *
     */
   /* public function __construct(array $attributes = array())
    {
        if(auth()){
        $this->setRawAttributes(array(
            'user_id' => \Auth::user()->id), true);
        parent::__construct($attributes);
    }
        }*/
    /*public function sales():HasMany
    {
        return $this->hasMany(Order_item::class);
    }*/
/*
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'products_colors', 'product_id', 'color_id')->withTimestamps();
    }*/



    /**
     * commented recently  for editing
     */

   /* public function scopeSearchProducts(Builder $query,$searched_value)
    {
        $query
            ->orderBy('created_at',direction:'asc');
    }*/
    public function scopeNewProducts(Builder $query)
    {
        $query
            ->orderBy('created_at',direction:'asc');
    }
    public function scopeDiscounts(Builder $query)
    {
        $query
            ->orderBy('created_at',direction:'asc');
    }
    public function scopeRecommendedProducts(Builder $query)
    {
        $query
            ->orderBy('created_at',direction:'asc');
    }
    public function scopeSpecialProducts(Builder $query)
    {
        $query
            ->orderBy('created_at',direction:'asc');
    }
    public function scopeTopSoledProducts(Builder $query)
    {
        $query             ->orderBy('created_at',direction:'asc');

        //  ->withCount('sales');
    }
/*    public function scopeSoledCount(Builder $query)
    {
        $query
            ->join('sections','sections_categories.section_id','sections.id')
            ->join('categories','sections_categories.category_id','categories.id')
            ->select("sections_categories.id",\DB::raw("CONCAT(sections.section_name,' ',categories.category_name) as name"))->get();
    }


    public function scopePopularProducts(Builder $query)
    {
        $query
            ->withCount('sales');
    }

    protected function popularProductsScope(Builder $query)
    {
        $query
            ->withCount('sales');
    }
    public function scopeGetProducts(Builder $query)
    {
        $query
            ->with([
                'images'=>function($query){
                    $query->select('product_id','id','path');
                }
            ])->get(['id','product_name','old_price','new_price','section_id','type_id','category_id']);
    }*/




  /*  public function scopeGetProducts(Builder $query)
    {
        $query
            ->with([
            'images'=>function($query){
                $query->select('product_id','id','path');
            },
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'type'=>function($query) {
                $query->select('id','type_name');
            },
            'sales'=>function($query) {
                $query->count();
            }
        ])->get(['id','product_name','old_price','new_price','section_id','created_at','type_id','category_id']);
    }*/
    /*
    public function scopeSoled(Builder $query)
    {
        $query
            ->join('sections','sections_categories.section_id','sections.id')
            ->join('categories','sections_categories.category_id','categories.id')
            ->select("sections_categories.id",\DB::raw("CONCAT(sections.section_name,' ',categories.category_name) as name"))->get();
    }*/
}
