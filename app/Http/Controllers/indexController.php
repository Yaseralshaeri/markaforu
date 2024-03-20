<?php

namespace App\Http\Controllers;

use App\interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Image;
use App\Models\Media;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class indexController extends Controller
{


    private $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //connectify('success', 'Connection Found', 'Success Message Here');
         return view('index',['categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'newProducts'=>$this->getNewProducts(),'heroCarousel'=>$this->getIndexHero(),'indexAds'=>$this->getIndexTopAd(),'categoryNewProducts'=>$this->getCategoryNewProducts(),'specialProducts'=>$this->getSpecialProducts(),'indexBanner'=>$this->getIndexBanner(),'indexBannerAd'=>$this->getIndexBannerAd(),'topSoldProducts'=>$this->getTopSoldProducts(),'recommendedProducts'=>$this->getRecommendedProducts(),'brands'=>$this->getBrands(),'hasCart'=>$this->hasCart()]);
    }

        public function getIndexBannerAd():\Illuminate\Database\Eloquent\Collection
    {
        return \App\Models\Advertisement::with([
            'media'=>function($query){
                $query->select('mediable_id','path');
            },
        ])->get(['ads_name','id','note'])
            ->where('ads_type','=','banner_ad')
            ->where('ads_public_id','=','banner_index_ad');
    }
    public function getIndexBanner():\Illuminate\Database\Eloquent\Collection
    {

        return  \App\Models\Media::where('mediable_type','=','banner_index')->where('show_in','=','1')->get(['path','media_name','media_description']);
    }
    public function getIndexHero():\Illuminate\Database\Eloquent\Collection
    {
        return  Media::where('mediable_type','=','heroCarousel')->get(['path','media_name']);
    }

    public function getIndexTopAd():\Illuminate\Database\Eloquent\Collection
    {
        return \App\Models\Advertisement::with([
            'media'=>function($query){
                $query->select('mediable_id','path');
            },
            'products'=>function($query){
                $query->select('advertisement_id','product_id','products.id','product_name');
            },
        ])->where('ads_type','=','top_ad')->take(2)->get(['ads_name','id','note']);
    }


    public function getCategories():Collection
    {

        return \App\Models\Category::with([
            'media'=>function($query){
                $query->select('mediable_type','mediable_id','id','path')
                    ->where('mediable_type','=','App\Models\Category');
            },
        ])->get(['category_name','id']);
    }
    public function getProduct($productId)
    {
       return $this->productRepository->getProduct($productId);
    }

    public function getProductQuickView($productId)
    {
        connectify('success', 'Connection Found', 'Success Message Here');
        $product=$this->productRepository->getProduct($productId);
        return response()->json([
            'product'=>$product,
        ]);
    }
    public function getCollectionsProducts():\Illuminate\Database\Eloquent\Collection
    {
        return $this->productRepository->getCollectionsProducts();
    }

    public function getTopSoldProducts():\Illuminate\Database\Eloquent\Collection
    {

        return $this->productRepository->getProducts('TopSoledProducts')->get();

    }
    public function getSpecialProducts():\Illuminate\Database\Eloquent\Collection
    {

        return $this->productRepository->getProducts('SpecialProducts')->get();

    }
    public function getRecommendedProducts()
    {
       /* return Product::with([
        'images'=>function($query){
            $query->select('product_id','path')
                ->where('showed','=','1');
        }
    ])->take(6)->select(['id','product_name','old_price','new_price','keyword'])->paginate(3);*/
        return $this->productRepository->getProducts('RecommendedProducts')->paginate(3);

    }
    public function getNewProducts():Collection
    {
        return $this->productRepository->getProducts('NewProducts')->get();
    }

    public function getCategoryNewProducts():\Illuminate\Database\Eloquent\Collection
    {

        return $this->productRepository->getCategoryNewProducts();

    }

    public function getBrands():\Illuminate\Database\Eloquent\Collection
    {
        return  Brand::get(['brand_logo','brand_name','id']);
    }
    public function geCollections():\Illuminate\Database\Eloquent\Collection
    {
        return  \App\Models\Collection::get(['collection_name','id']);
    }

    public function hasCart()
    {
        $cart=\App\Models\Cart::where('customer_id','=',\request()->cookie('customer_id'))->first()->loadCount('cartItems');
      if ($cart->cart_items_count>0){
          return  $cart->cart_items_count;

      }
        return  0;
    }
}
