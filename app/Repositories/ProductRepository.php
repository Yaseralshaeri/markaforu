<?php

namespace App\Repositories;

use App\Http\Traits\productTrait;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Support\Collection;

class ProductRepository implements \App\interfaces\ProductInterface
{
    use productTrait;
    public function getProduct($productId)
    {
        return  \App\Models\Product::with([
            'images'=>function($query){
                $query->select('product_id','path','color_id');
            },
            'images.color'=>function($query){
                $query->select('color_hex','id');
            },
            'sizes'=>function($query){
                $query->select('product_id','size_id','size');
            },
            'categories'=>function($query){
                $query->select('product_id','category_id','category_name');
            }
        ])->where('id','=',$productId)->get(['id','product_name','old_price','new_price','created_at','quantity','description']);


    }


    public function getProducts($scope){

        return Product::with([
            'images'=>function($query){
                $query->select('product_id','path')
                    ->where('showed','=','1');
            }
        ])->scopes($scope)->take(6)->select(['id','product_name','old_price','new_price','keyword']);
    }

    public function getCollectionsProducts($request,$scope): \Illuminate\Database\Eloquent\Builder
    {
        $order= $this->sortingProduct($request)->getData();
        $q_brands = $request->query("brands");
        $q_categories = $request->query("Categories");
        $q_sizes = $request->query("sizes");
        $q_colors = $request->query("colors");
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return \App\Models\Product::with([
            'images'=>function($query){
                $query->select('product_id','path','color_id');
            },
            'images.color'=>function($query){
                $query->select('color_hex','id');
            }
        ])->where(function($query) use($q_categories){
            $query->whereRelation('categories','category_id',explode(',',$q_categories))->orWhereRaw("'".$q_categories."'=''");})
            ->where(function($query) use($q_brands){
            $query->whereIn('brand_id',explode(',',$q_brands))->orWhereRaw("'".$q_brands."'=''");})
            ->where(function($query) use($q_sizes){
                $query->whereRelation('sizes','size_id',explode(',',$q_sizes))->orWhereRaw("'".$q_sizes."'=''");})
            ->where(function($query) use($q_colors){
                $query->whereRelation('images','color_id',explode(',',$q_colors))->orWhereRaw("'".$q_colors."'=''");})
            ->where('new_price','>', intval($q_maxPrice))
            ->scopes($scope)->take(100)->select(['id','product_name','old_price','new_price','keyword','brand_id'])->orderBy($order->o_column,$order->o_order);

    }

    public function getProductRelatedProducts():\Illuminate\Database\Eloquent\Collection
    {
        return Product::with([
            'images'=>function($query){
                $query->select('product_id','path')
                    ->where('showed','=','1');
            }
        ])->latest()->take(12)->get(['id','product_name','old_price','new_price','keyword']);
    }
    public function getCategoryNewProducts(): \Illuminate\Database\Eloquent\Collection|array
    {
        return \App\Models\Category::with([
            'products'=>function($query){
                $query->select('category_id','product_id','products.id','product_name','old_price','new_price','keyword');
            },
            'products.images'=>function($query){
                $query->select('product_id','id','path')
                    ->where('showed','=','1');
            },
        ])->get(['category_name','id']);
    }
    public function getCategoryProducts($request,$categoryId): \Illuminate\Database\Eloquent\Builder
    {

        $order= $this->sortingProduct($request)->getData();
        $q_brands = $request->query("brands");
        $searched_value = $request->query("search_value");
        $q_sizes = $request->query("sizes");
        $q_colors = $request->query("colors");
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return \App\Models\Product::with([
            'images'=>function($query){
                $query->select('product_id','path','color_id');
            },
            'images.color'=>function($query){
                $query->select('color_hex','id');
            }
        ])->where(function($query) use($searched_value){
                $query->where('tags','LIKE','%'.$searched_value.'%')->orWhereRaw("'".$searched_value."'=''");})
            ->where(function($query) use($q_brands){
                   $query->whereIn('brand_id',explode(',',$q_brands))->orWhereRaw("'".$q_brands."'=''");})
          ->where(function($query) use($q_sizes){
                $query->whereRelation('sizes','size_id',explode(',',$q_sizes))->orWhereRaw("'".$q_sizes."'=''");})
            ->where(function($query) use($q_colors){
                $query->whereRelation('images','color_id',explode(',',$q_colors))->orWhereRaw("'".$q_colors."'=''");})
            ->where('new_price','>', intval($q_maxPrice))
          ->whereRelation('categories','category_id','=',$categoryId)->take(100)->select(['id','product_name','old_price','new_price','keyword','brand_id','tags'])->orderBy($order->o_column,$order->o_order);

    }

    public function getAdvertisementProducts($request,$advertisementId): \Illuminate\Database\Eloquent\Collection|array
    {

        return \App\Models\Product::with([
            'images'=>function($query){
                $query->select('product_id','path')
                    ->where('showed','=','1');
            },
        ])->whereRelation('advertisements','advertisement_id','=',$advertisementId)->take(100)->get(['id','product_name','old_price','new_price','keyword']);

    }
    public function getBrandProducts($request,$brandId): \Illuminate\Database\Eloquent\Builder
    {
        $order= $this->sortingProduct($request)->getData();
        $q_categories = $request->query("Categories");
        $q_sizes = $request->query("sizes");
        $q_colors = $request->query("colors");
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return \App\Models\Product::with([
            'images'=>function($query){
                $query->select('product_id','path','color_id');
            },
            'images.color'=>function($query){
                $query->select('color_hex','id');
            },
        ])->where(function($query) use($q_categories){
            $query->whereRelation('categories','category_id',explode(',',$q_categories))->orWhereRaw("'".$q_categories."'=''");})
            ->where(function($query) use($q_sizes){
                $query->whereRelation('sizes','size_id',explode(',',$q_sizes))->orWhereRaw("'".$q_sizes."'=''");})
            ->where(function($query) use($q_colors){
                $query->whereRelation('images','color_id',explode(',',$q_colors))->orWhereRaw("'".$q_colors."'=''");})
            ->where('new_price','>', intval($q_maxPrice))
            ->where('brand_id','=',5)->take(100)->select(['id','product_name','old_price','new_price','keyword'])->orderBy($order->o_column,$order->o_order);
    }


}
