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
                 <div class="cart-totally rounded my-4 px-md-5">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">السلة <span class="fw-normal">اجمالي</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 ms-4">مبلغ الطلب:</h5>
                                <p class="mb-0"><span  id="cart_totally">99</span>ر.س </p>
                            </div>
                        </div>
                        <div class="py-2  px-3  border-top border-bottom ">
                            <span>لديك كود خصم ؟</span>
                            <div class="input-group my-2 ltr ">
                                <button class="btn btn-outline-secondary px-3" type="button" id="discountBtn">خصم</button>
                                <input type="text" class="form-control"  aria-label="Example text with button addon" id="discountCode" placeholder="كود الخصم" aria-describedby="button-addon1">
                            </div>
                            <span class="text-success text-left"> مبلغ الخصم ؟ </span>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">اجمالي</h5>
                            <p class="mb-0  ps-4" ><span  id="all_cart_totally">99</span>ر.س  </p>
                        </div>
                        <div class="p-3 text-center ">
                                <button   type="button"  class="btn border-secondary bg-primary next-step py-2-5 px-3 text-uppercase w-100 next-step text-secondary">متابعة عملية الشراء</button>
                        </div>
                    </div>

        </div>
</div>
<!-- Checkout Page End -->
