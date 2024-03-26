<?php
namespace App\Http\Traits;
use App\Models\Cart;
use App\Models\Product;
trait cartCookieTrait {

    public function cartCookie()
    {
       /* if(!\request()->hasCookie('customer_id')){
            $customer_id=uniqid();
            \Cookie::queue(\Cookie::make( 'customer_id', $customer_id,1));
            $cart= new Cart();
            $cart->customer_id=$customer_id;
            $cart->save();
            return $customer_id;
        }
        else{
            return   \request()->cookie('customer_id');
        }*/
        if(!\request()->hasCookie('customer_id')){
            $customer_id=uniqid();
            \Cookie::queue(\Cookie::make( 'customer_id', $customer_id,1));
            $cart= new Cart();
            $cart->customer_id=$customer_id;
            $cart->save();
            return $customer_id;
        }
        else{
            return   \request()->cookie('customer_id');
        }
    }
    public function getCookie(){

    }
    public function deleteCookie(){

    }
}
