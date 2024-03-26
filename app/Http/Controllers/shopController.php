<?php

namespace App\Http\Controllers;

use App\interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;
use App\Models\Section;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{

    private $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function categoryIndex(Request $request,$categoryId,$categoryName)
    {
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return view('shop',['shopName'=>$categoryName,'isCategory'=>true,'isCollection'=>false,'categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'products'=>$this->getCategoryProducts($request,$categoryId),'brands'=>$this->getBrands(),'colors'=>$this->getColors(),'sizes'=>$this->getSizes(),'hasCart'=>$this->hasCart(),'order'=>$request->query("order"),'q_brands'=>$request->query("brands"),'q_sizes'=>$request->query("sizes"),'q_colors'=>$request->query("colors"),'q_maxPrice'=>$q_maxPrice,]);
    }
    public function brandIndex(Request $request,$brandId,$brandName)
    {
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return view('shop',['shopName'=>$brandName,'isCategory'=>false,'isCollection'=>false,'categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'products'=>$this->getBrandProducts($request,$brandId),'brands'=>$this->getBrands(),'colors'=>$this->getColors(),'sizes'=>$this->getSizes(),'hasCart'=>$this->hasCart(),'order'=>$request->query("order"),'q_categories'=>$request->query("Categories"),'q_sizes'=>$request->query("sizes"),'q_colors'=>$request->query("colors"),'q_maxPrice'=>$q_maxPrice]);
    }

    public function advertisementIndex(Request $request,$advertisementId,$advertisementName)
    {
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return view('shop',['shopName'=>$advertisementName,'isCategory'=>false,'isCollection'=>true,'categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'products'=>$this->getAdvertisementProducts($request,$advertisementId),'brands'=>$this->getBrands(),'colors'=>$this->getColors(),'sizes'=>$this->getSizes(),'hasCart'=>$this->hasCart(),'order'=>$request->query("order"),'q_brands'=>$request->query("brands"),'q_categories'=>$request->query("Categories"),'q_sizes'=>$request->query("sizes"),'q_colors'=>$request->query("colors"),'q_maxPrice'=>$q_maxPrice,'search_value'=>$request->query("search_value")]);
    }

    public function Index(Request $request,$characteristicScope,$characteristicName)
    {
        $q_maxPrice=$request->query("maxPrice");
        if (!$q_maxPrice){
            $q_maxPrice=10;
        }
        return view('shop',['shopName'=>$characteristicName,'isCategory'=>false,'isCollection'=>true,'categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'products'=>$this->getCollectionsProducts($request,$characteristicScope),'brands'=>$this->getBrands(),'colors'=>$this->getColors(),'sizes'=>$this->getSizes(),'hasCart'=>$this->hasCart(),'order'=>$request->query("order"),'q_brands'=>$request->query("brands"),'q_categories'=>$request->query("Categories"),'q_sizes'=>$request->query("sizes"),'q_colors'=>$request->query("colors"),'q_maxPrice'=>$q_maxPrice,'search_value'=>$request->query("search_value")]);
    }


    public function getCategoryProducts($request,$categoryId)
    {
        return $this->productRepository->getCategoryProducts($request,$categoryId)->paginate(6);
    }

    public function getBrandProducts($request,$brandId)
    {
        return $this->productRepository->getBrandProducts($request,$brandId)->paginate(6);
    }

    public function getAdvertisementProducts($request,$advertisementId)
    {
        return $this->productRepository->getAdvertisementProducts($request,$advertisementId)->paginate(6);
    }
    public function getCollectionsProducts($request,$characteristicScope)
    {
        return $this->productRepository->getCollectionsProducts($request,$characteristicScope)->paginate(6);
    }

    public function getCategories(): \Illuminate\Support\Collection
    {
        return DB::table('categories')
            ->select('category_name', 'id')
            ->get();
    }

    public function getProduct($productId)
    {
        return $this->productRepository->getProduct($productId);
    }

    public function getBrands():\Illuminate\Database\Eloquent\Collection
    {
        return  Brand::get(['brand_logo','brand_name','id']);
    }

    public function geCollections():\Illuminate\Database\Eloquent\Collection
    {
        return  \App\Models\Collection::get(['collection_name','id']);
    }
    public function getColors():\Illuminate\Database\Eloquent\Collection
    {
        return Color::get(['color_hex','id']);
    }
    public function getSizes():\Illuminate\Database\Eloquent\Collection
    {
        return Size::get(['size','id']);
    }
    public function hasCart()
    {
        $cart=\App\Models\Cart::latest()->first();
        if ($cart){
            $cart=$cart->loadCount('cartItems');
            return  $cart->cart_items_count;

        }
        return  0;
    }
}
