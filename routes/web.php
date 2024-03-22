<?php

use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Traits\productTrait;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/',function () {
    return view('index');
});*/

Route::get('/',[\App\Http\Controllers\indexController::class,'index']);
Route::get('/section/{id}',[\App\Http\Controllers\SectionController::class,'index']);

Route::get('/shop',[shopController::class,'index']);
Route::get('/category/{categoryId}/{categoryName}',[shopController::class,'categoryIndex']);
Route::get('/brand/{brandId}/{brandName}',[shopController::class,'brandIndex']);
Route::get('/advertisement/{advertisementId}/{advertisementName}',[shopController::class,'advertisementIndex']);
Route::get('/char/{characteristicId}/{characteristicName}',[shopController::class,'Index']);

Route::get('/product/{productId}/{productName}',[\App\Http\Controllers\ProductController::class,'index']);

/******
 * Cart routes start
 *
 *****/
Route::post('/cart/store',[\App\Http\Controllers\CartController::class,'store'])->name('storeCart');
Route::post('/cart/discount',[\App\Http\Controllers\CartController::class,'discount']);
Route::get('/cart',[\App\Http\Controllers\CartController::class,'index']);
Route::get('cart/show',[\App\Http\Controllers\CartController::class,'getCartItems']);
Route::delete('/cart/{id}',[\App\Http\Controllers\CartController::class,'destroy']);
Route::put('/cart/{id}',[\App\Http\Controllers\CartController::class,'update']);
Route::get('cart/count',[\App\Http\Controllers\CartController::class,'getCartItems']);
/******
 * Cart routes end
 *
 *****/

/******
 * checkout routes start
 *
 *****/
Route::resource('/address',\App\Http\Controllers\AddressController::class);
Route::post('/address/store',[\App\Http\Controllers\AddressController::class,'store']);

/******
 * checkout routes end
 *
 *****/

Route::get('/getProduct/{id}',[\App\Http\Controllers\indexController::class,'getProduct']);
Route::get('/getProductQuickView/{id}',[\App\Http\Controllers\indexController::class,'getProductQuickView']);


/******
 * order routes start
 *
 *****/
Route::get('/order/{order}',[\App\Http\Controllers\OrderController::class,'index']);


/******
 * order routes end
 *
 *****/


Route::get('/r',function () {
    // Cookie::queue(Cookie::make( 'customer_id', uniqid(),18000));
   //return \request()->cookie('customer_id');

});




