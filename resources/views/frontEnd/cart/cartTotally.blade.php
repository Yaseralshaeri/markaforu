@yield('cartTotally')
<!-- Cart Page Start -->
@forelse ($getCart as $cart)
        <div>
            <div class="p-4">
                <h1 class="display-6 mb-4">السلة <span class="fw-normal">اجمالي</span></h1>
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="mb-0 ms-4">مبلغ الطلب:</h5>
                    <p class="mb-0"><span  id="cart_totally">{{$cart->cart_items_sum_totally}}</span>ر.س </p>
                </div>
            </div>
            @if(!$cart->has_discount)
                <div class="py-2  px-3  border-top border-bottom ">
                    <span>لديك كود خصم ؟</span>
                    <div class="input-group my-2 ltr ">
                        <button class="btn btn-outline-secondary px-3" type="button" id="discountBtn">خصم</button>
                        <input type="text" class="form-control"  aria-label="Example text with button addon" id="discountCode" placeholder="كود الخصم" aria-describedby="button-addon1">
                    </div>
                    <span class="text-success text-left"> مبلغ الخصم ؟ </span>
                </div>
            @else
                <div class="py-4  px-3 d-flex justify-content-between  border-top border-bottom ">
                    <h5 class="mb-0 ps-4 me-4 ">مبلغ الخصم</h5>
                    <p class="mb-0  ps-4 " ><span  id="discountPrice">{{$cart->cart_items_sum_totally-$cart->totally}}</span>ر.س  </p>
                </div>
            @endif
            <div class="py-4 mb-4 border-bottom d-flex justify-content-between">
                <h5 class="mb-0 ps-4 me-4">اجمالي</h5>
                <p class="mb-0  ps-4" ><span  id="all_cart_totally">{{$cart->totally}}</span>ر.س  </p>
            </div>

        </div>
@empty
    <p>لاتوجد منتجات متاحة حاليا</p>
@endforelse

<!-- Cart Page End -->
