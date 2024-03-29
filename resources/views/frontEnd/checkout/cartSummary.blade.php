@yield('cartSummary')
<!-- Checkout Page Start -->
<div class="container py-5">
    <h1 class="mb-4">ملخص الطلب</h1>
        <div  style="padding-left: 0.5px;padding-right: 0.5px">
                <div class="table-responsive rounded cart-totally px-md-5 my-3 py-5">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($getCart as $cart)
                            @foreach ($cart->cartItems as  $cartItem)
                                <tr>
                                    @foreach ($cartItem->product->images as $product_images)
                                        @foreach ($product_images->path as $img)
                                            @if ($loop->first)
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <img src="{{asset("storage/$img")}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                    </div>
                                                </th>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td class="py-5">{{$cartItem->product->product_name}}</td>
                                    <td class="py-5">{{$cartItem->price}}</td>
                                    <td class="py-5">{{$cartItem->quantity}}</td>
                                    <td class="py-5">{{$cartItem->totally}}</td>
                                </tr>
                            @endforeach
                        @empty
                            <p>لاتوجد منتجات مضافة حاليا</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            <div class="cart-totally rounded my-4 px-md-5 ">
                @include('.frontEnd.cart.cartTotally')
                <div class="p-3 text-center ">
                    <button   type="button"  class="btn border-secondary bg-primary next-step py-2-5 px-3 text-uppercase w-100 next-step text-secondary">متابعة عملية الشراء</button>
                </div>
            </div>
        </div>
</div>
<!-- Checkout Page End -->
