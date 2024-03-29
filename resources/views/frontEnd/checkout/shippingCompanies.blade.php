@yield('shippingCompanies')
<!-- Checkout Page Start -->
<div class="container py-5">
    <h1 class="mb-4">شركة الشحن </h1>
        <div  style="padding-left: 0.5px;padding-right: 0.5px">
            <div class="cart-totally rounded py-5 ltr px-3 ">
                <section>
                    @forelse ($shippingCompanies as $shippingCompany)
                    <div>
                        <input class="input-shipping" type="radio"  id="control_0{{$shippingCompany->id}}" onchange="setShippingCompany({{$shippingCompany->id}})" name="shippingCompanyId" value="{{$shippingCompany->id}}"  @if ($loop->first)  checked @endif>
                        <label class="label-shipping" for="control_0{{$shippingCompany->id}}">
                            <h2>{{$shippingCompany->company_name}}</h2>
                            <p>{{$shippingCompany->note}}</p>
                            <span class="text-danger ">{{$shippingCompany->shipping_coast}} ر.س</span>
                        </label>
                    </div>
                    @empty
                        <p>لاتوجد شركات شحن متاحة حاليا</p>
                    @endforelse
                </section>
            </div>

            <div class="cart-totally rounded my-4 px-md-5 ">
                @forelse ($getCart as $cart)
                    <div>
                        <div class="p-4">
                            <h1 class="display-6 mb-4">السلة <span class="fw-normal">اجمالي</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 ms-4">مبلغ الطلب:</h5>
                                <p class="mb-0"><span  id="cart_totally-2">{{$cart->cart_items_sum_totally}}</span>ر.س </p>
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
                            <p class="mb-0  ps-4" ><span  id="all_cart_totally-2">{{$cart->totally}}</span>ر.س  </p>
                        </div>
                    </div>
                @empty
                    <p>لاتوجد منتجات متاحة حاليا</p>
                @endforelse
            </div>

        </div>
</div>
<!-- Checkout Page End -->
