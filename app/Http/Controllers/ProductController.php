<?php

namespace App\Http\Controllers;

use App\interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository=$productRepository;
    }
    public function index($productId,$productNmae)
    {


        return view('product_details',['categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'getProduct'=>$this->getProduct($productId),'relatedProducts'=>$this->getProductRelatedProducts($productId),'recommendedProducts'=>$this->getRecommendedProducts(),'brands'=>$this->getBrands(),'sidebarAds'=>$this->getSidebarAds(),'hasCart'=>$this->hasCart()]);

    }


    public function getSidebarAds():\Illuminate\Database\Eloquent\Collection
    {
        return \App\Models\Advertisement::with([
            'media'=>function($query){
                $query->select('mediable_id','path');
            },
        ])->take(1)->get(['ads_name','id','note']);
    }

    public function getProductRelatedProducts():\Illuminate\Database\Eloquent\Collection
    {

        return $this->productRepository->getProductRelatedProducts();

    }

    public function getCategories(): \Illuminate\Support\Collection
    {
        return DB::table('categories')
            ->select('category_name','id')
            ->get();
    }

    public function getProduct($productId)
    {
        return $this->productRepository->getProduct($productId);
    }
    public function getRecommendedProducts()
    {

        return $this->productRepository->getProducts('RecommendedProducts')->paginate(3);

    }
    public function geCollections():\Illuminate\Database\Eloquent\Collection
    {
        return  \App\Models\Collection::get(['collection_name','id']);
    }
    public function getBrands():\Illuminate\Database\Eloquent\Collection
    {
        return  Brand::get(['brand_logo','brand_name','id']);
    }

    public function hasCart()
    {
        $cart=\App\Models\Cart::where('customer_id','=',\request()->cookie('customer_id'))->first()->loadCount('cartItems');
        return  $cart->cart_items_count;
    }
}
