@yield('cartItems')
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5 rtl">
        <div class="row" id="cart_ite">
           @forelse ($getCartItems as $cart)
                @foreach ($cart->cartItems as  $cartItem)
                <div class="col-md-6 col-4 m-2 col-xl-4 pt-4  pe- ps-  rounded bg-soDark recomnded-item position-relative" id="item-{{346*$cartItem->id}}">
                <div class="position-absolute rounded-pillborder border-secondary  px-2 py-1" onclick="removeCartItem({{$cartItem->id}})" style="top: 4px;left: 4px;" >
                    <i class="fa fa-times text-danger"></i>
                </div>
                <div class="row align-items-center  ltr  ">
                    @foreach ($cartItem->product->images as $product_images)
                        @if ($loop->first)
                        @foreach ($product_images->path as $img)
                            @if ($loop->first)
                                <div class="col-6  pb-3 border-5 mt-3"  >
                                    <img src="{{asset("storage/$img")}}" class="img-fluid rounded-circle w-100 mt-1"
                                         style="border: 5px solid #ffbe33;" alt="">
                                </div>
                            @endif
                        @endforeach
                        @endif

                    @endforeach
                    <div class="col-6 brands rtl">
                        <h6 class="text-white product-name text-end pe-2">{{$cartItem->product->product_name}}</h6>
                        <div class="py-2">
                            <span class="text-white"> سعر الوحدة :</span>
                            <span class="text-white fs-7 fw-bold">{{$cartItem->price}} ر.س</span>
                            <del class="text-danger fs-8 p-1">٦٩ ر.س</del>
                        </div>
                        <div class="d-flex justify-content-between flex-lg-wrap px-md py-2">
                            <div class="d-flex justify-content-end my-2">
                                <span class="text-white"> اللون :</span>
                                <i class="checkmark mx-2"style="background:{{$cartItem->item_color}};border-radius: 50%;width: 25px;height: 25px;"></i>
                            </div>
                            <div class="d-flex justify-content-start my-2">
                                <span class="text-white"> المقاس :</span>
                                <a class="mx-2 bg-secondary pt-1" style="background:#f1f1f1;border-radius: 50%;width:34px;height:34px;text-align: center"><span class="checkmark ">{{$cartItem->item_size}}</span></a>
                            </div>
                        </div>
                        <div class="py-1 d-flex">
                            <span class="text-white">الكمية  :</span>
                            <div class="input-group quantity  ms-3 me-3" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-secondary px-2 py-1" onclick="updateCartItem({{$cartItem->id}},0)">
                                        <i class="fa text-white fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" id="item{{$cartItem->id}}Quantity" class="form-control form-control-sm text-center bg-soDark text-white border-0"
                                       value="{{$cartItem->quantity}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-secondary px-2 py-" onclick="updateCartItem({{$cartItem->id}},1)">
                                        <i class="fa text-white fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="py-1">
                            <span class="text-white">  الاجمالي :</span>
                            <span class="text-white fs-7 fw-bold"  > <span id="cartItem-{{$cartItem->id}}-totally">{{$cartItem->totally}}</span> ر.س </span>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @empty
                <p>لاتوجد منتجات مضافة حاليا</p>
            @endforelse
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" id="discountCode" placeholder="كود الخصم">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-dark " id="discountBtn" type="button"> الحصول على الخصم</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">السلة <span class="fw-normal">اجمالي</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 ms-4">مبلغ الطلب:</h5>
                            <p class="mb-0"><span  id="cart_totally">{{$getCartItems[0]->totally}}</span>ر.س </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 ms-4">مبلغ الشحن</h5>
                            <div class="">
                                <p class="mb-0">السعر:0 ر.س</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">الشحن الى مصر.</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">اجمالي</h5>
                        <p class="mb-0  ps-4" ><span  id="all_cart_totally">{{$getCartItems[0]->totally}}</span>ر.س  </p>
                    </div>
                   <a   href="@if($hasCart>0)/address
                             @else #
                           @endif
                       "><button
                           class="btn border-secondary rounded-pill px-4 py-3 text-dark  text-uppercase mb-4 me-4"
                           type="button">متابعة عملية الشراء</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
