<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingCompany;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout',['categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'brands'=>$this->getBrands(),'getCart'=>$this->getCart(),'hasCart'=>$this->hasCart(),'shippingCompanies'=>$this->getShippingCompanies()]);

    }
    public function getBrands():\Illuminate\Database\Eloquent\Collection
    {
        return  Brand::get(['brand_logo','brand_name','id']);
    }
    public function geCollections():\Illuminate\Database\Eloquent\Collection
    {
        return  \App\Models\Collection::get(['collection_name','id']);
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

    public function getCart()
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
        ])->where('customer_id','=',\request()->session()->get('customer_id'))->withSum('cartItems','totally')->get();

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address=new address();
        $address->country=$request->country;
        $address->city=$request->city;
        $address->state=$request->state;
        $address->street=$request->street;
        $address->zip_code=$request->zip_code;
        $address->save();

        $order=new Order();
        $order->customer_id=$request->cookie('customer_id');
        $order->customer_name=$request->first_name.''.$request->last_name;
        $order->order_coast=$this->getCartTotally();
        $order->email=$request->email;
        $order->phone_number=$request->phone_number;
        $order->address_id=$address->id;
        $order->save();


       // return view('cart',['categories'=> $this->getCategories(),'collections'=> $this->geCollections(),'brands'=>$this->getBrands()]);

        return $order->id;
    }

    /**
     * Display the specified resource.
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(address $address)
    {
        //
    }

    public function getCartTotally()
    {
        $cart=Cart::find(10);
        return  $cart->totally;

    }
    public function hasCart()
    {
        $cart=\App\Models\Cart::where('customer_id','=',\request()->session()->get('customer_id'))->first();
        if ($cart){
            $cart=$cart->loadCount('cartItems');
            return  $cart->cart_items_count;

        }
        return  0;
    }

    public function getCartCount()
    {

        return $this->hasCart();
    }


    public function getShippingCompanies()
    {

        return ShippingCompany::all();
    }
}
