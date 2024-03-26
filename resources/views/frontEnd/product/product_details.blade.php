@yield('product_details')
<div class="row ltr pro-details">
    @forelse ($getProduct as $product)
    <div class="col-md-6 col-lg-7 p-b-30">
        <div class="p-l-25 p-r-30 p-lr-0-lg">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>
                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                <div class="slick3 gallery-lb">
                    @foreach ($product->images as $product_images)
                            @foreach ($product_images->path as $img)
                                    <div class="item-slick3" data-thumb="{{asset("storage/$img")}}">
                                        <div class="wrap-pic-w pos-relative product-main-image" >
                                            <img src="{{asset("storage/$img")}}" alt="IMG-PRODUCT">
                                        </div>
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset("storage/$img")}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                            @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-5 p-b-30 px-4 rtl">
        <div id="productMessages" class="toast-notify  mb-2 align-items-center text-white  border-0 d-none" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body d-flex justify-content-between" id="toast-body">
            </div>
        </div>
        <div class="product-details py-">
            <h2 class="product-name">{{$product->product_name}}</h2>
            <i class="d-none" id="product_id" data_value="{{$product->id}}"></i>
            <div>
                <a class="review-link" href="#">  10 مراجعات لهذا المنتج | اضف مراجعتك </a>
                <div class="product-rating">
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
            <div>
                </h3>
                <h3 class="product-price" id="product_price" data_value="{{$product->new_price}}">{{$product->new_price}}
                    <del class="product-old-price">{{$product->old_price}}</del>

                </h3>
            </div>

            <div class="product_availalbe">
                <ul class="d-flex">
                    <li>المخزون  <span class="stock">المتاح :</span></li>
                    <li id="available_quantity" data_value="{{$product->quantity}}"> <i  class="icon-layers icons"></i> يتبقى  <span>{{$product->quantity}}</span> فقط </li>
                </ul>
            </div>
            <p>
                {{$product->description}}
            </p>

            <div class="product_variant">
                <div class="filter__list widget_color d-flex align-items-center">
                    <h3>اختيار اللون </h3>
                    <ul>
                        @foreach ($product->images as $image)
                                <li>
                                    <input name="product_color"  data_value="{{$image->color->color_hex}}" type="radio">
                                    <span class="checkmark " style="background:{{$image->color->color_hex}} "></span>
                                </li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter__list widget_color d-flex align-items-center">
                    <h3>اختيار المقاس</h3>
                    <ul>
                        @foreach ($product->sizes as $productSize)
                         <li class="m-1">
                             <input type="radio"  class="p-4" name="product_size"  data_value="{{$productSize->size}}">
                             <span class="checkmark text-center pt-1"  style="width: 40px;height: 40px;background-color: #f1f1f1;color: #999999">{{$productSize->size}}</span>
                         </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <span>الكمية </span>
                <div class="input-group quantity mb-5 ms-3 " style="width: 100px;">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control form-control-sm text-center border-0"
                           value="1" id="quantity">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="ms-5 buttons align-items-center mt-n1 " id="addProductIdToCart">
                    <button class="btn btn-outline-dark" id="addProductIdToCartBtn"><i
                            class="fa fa-shopping-cart me-2 text-dark"></i> اضافة الى السلة</button>
                </div>

            </div>

            <ul class="product-btns">
                <li class="px-2 fs-6"><a class="text-dark" href="#"><i class="fa fa-heart-o text-secondary"></i>
                        اضافةالى المفضلة</a></li>
                <li class="pe-5 fs-6"><a class="text-dark" href="#"><i class="fa fa-exchange text-secondary"></i>
                        عرض اكثر </a></li>
            </ul>
        </div>
    </div>
    @empty
        <p>لاتوجد منتج متاحة حاليا</p>
    @endforelse
</div>
