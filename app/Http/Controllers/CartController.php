<?php

namespace App\Http\Controllers;

use App\Http\Traits\cartCookieTrait;
use App\interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    use cartCookieTrait;

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
        return view('cart',['categories'=> $this->getCategories(),'recommendedProducts'=>$this->getRecommendedProducts(),'collections'=> $this->geCollections(),'brands'=>$this->getBrands(),'hasCart'=>$this->hasCart(),'getCartItems'=>$this->getCartItemsJs(),'getCart'=>$this->getCartItems()]);

    }
    public function getBrands():\Illuminate\Database\Eloquent\Collection
    {
        return  Brand::get(['brand_logo','brand_name','id']);
    }
    public function geCollections():\Illuminate\Database\Eloquent\Collection
    {
        return  \App\Models\Collection::get(['collection_name','id']);
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

    public function getCategories()
    {

        return \App\Models\Category::with([
            'media'=>function($query){
                $query->select('mediable_type','mediable_id','id','path')
                    ->where('mediable_type','=','App\Models\Category');
            },
        ])->get(['category_name','id']);
    }

    public function getCartItems()
    {
        return  \App\Models\Cart::with([
            'cartItems'=>function($query){
                $query->select('cart_id','product_id','id','totally','quantity','price','item_size','item_color');
            },
            'cartItems.product'=>function($query){
                $query->select('id','product_name');
            },
            'cartItems.product.images'=>function($query){
                $query->select('product_id','path')
                    ->where('showed','=','1');

            },
        ])->where('customer_id','=',\request()->cookie('customer_id'))->get();
    }

    public function getCartItemsJs()
    {
        return \App\Models\Cart::with([
            'cartItems'=>function($query){
                $query->select('cart_id','product_id','id','totally','quantity','price','item_size','item_color');
            },
            'cartItems.product'=>function($query){
                $query->select('id','product_name');
            },
            'cartItems.product.images'=>function($query){
                $query->select('product_id','path')

                ;
            },
        ])->where('customer_id','=',\request()->cookie('customer_id'))->get();

    }

    public function getCart()
    {
        $cart=Cart::latest()->first();
        return  $cart->id;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    public function cartQuantity()
    {
       $cart=Cart::find($this->getCart());
        $cart->totally=Cart_item::where('cart_id','=',$cart->id)->sum('totally');
        $cart->has_discount=false;
        $cart->save();
    }
    public function cartCookie()
    {
        if(!\request()->hasCookie('customer_id')){
            $customer_id=uniqid();
            Cookie::queue(Cookie::make( 'customer_id', $customer_id,40000));
            $cart= new Cart();
            $cart->customer_id=$customer_id;
            $cart->save();
            return $cart->id;
        }
        else{

            $cart=Cart::latest()->first();// where('customer_id','=',\request()->cookie('customer_id'))->first();
            return  $cart->id;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $items=new Cart_item();
     $items->cart_id=$this->cartCookie();
     $items->price=$request->price;
     $items->quantity=$request->quantity;
     $items->totally=$request->price*$request->quantity;
     $items->product_id=$request->product_id;
      $items->item_size=$request->item_size;
      $items->item_color=$request->item_color;
      $items->save();



     if ($items->save()) {
         $this->cartQuantity();
         return response()->json([
             'status' => 200,
             'cartCount'=>$this->getCartCount(),
             'message' => 'تمت اضافة المنتج الى السلة بنجاح'
         ]);
     }
     else{
         return response()->json([
             'status' => 400,
             'message' => 'لم تتم عملية الاضافة'
         ]);
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$item_id)
    {

        $cart_item = Cart_item::find($item_id);
        $cart_item->quantity=$request->quantity;
        $cart_item->totally=$cart_item->price*$request->quantity;
        $cart_item->save();
        $this->cartQuantity();

        return response()->json([
            'message'=>'تم اضافة الكمية بنجاح',
            'status'=>200,
            'cartItemTotally'=>$cart_item->totally,
            'cartTotally'=>$this->getCartTotally()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Cart_item::destroy($id);
        $this->cartQuantity();

        return response()->json([
            'message'=>'تم ازالة المنتج بنجاح',
            'cartCount'=>$this->getCartCount(),
            'status'=>200

        ]);
    }

    public function cartHasDiscount()
    {
        $cart=Cart::find($this->getCart());
        return  $cart->has_discount;

    }
    public function getCartTotally()
    {
        $cart=Cart::find($this->getCart());
        return  $cart->totally;

    }
    public function discount(Request $request)
    {

        if($this->cartHasDiscount()==1){
            return response()->json([
                'status'=>408,
                'message'=>'لديك خصم بالفعل'
            ]);
        }

        elseif($this->getCartTotally()<50){
            return response()->json([
                'status'=>408,
                'message'=>'لم تقم بشراء الاحد الادنى المطلوب لتحصل على الخصم'.$this->cartHasDiscount()
            ]);
        }
        else{
            $discount=DiscountCode::where('discount_code','=',$request->discountCode)->first();
            if (!$discount){
                return response()->json([
                    'status'=>408,
                    'message'=>'كود غير صالح'
                ]);
            }
            $cart=Cart::find($this->getCart());
            $discount_price = $cart->totally - ( $cart->totally * ($discount->discount_percentage / 100));
            $original_price=$cart->totally;
            $cart->totally=$discount_price;
            $cart->has_discount=true;
            if ($cart->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'تم خصم ' . $original_price - $discount_price . 'من قيمة المشتريات',
                    'cartTotally' => $cart->totally

                ]);
            }
            else{
                return response()->json([
                    'status'=>408,
                    'message'=>'حصل خطاء الرجاء المحاولة مرة اخرى او قم بالتواصل مع الادارة'
                ]);
            }
        }


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

    public function getCartCount()
    {

        return  $this->hasCart();
    }
}
