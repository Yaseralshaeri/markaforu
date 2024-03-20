@yield('SpecialProducts')
<!-- Special Shop Start-->
<div class="container-fluid fruite py-1 ">
    <div class="container py-4">
        <div class="d-flex justify-content-between position-relative" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5); border--left-radius: 20%">
            <h1 class="mb-0">منتجات فاخرة</h1>
                <a href="" class=" btn border border-secondary rounded-pill px-3 px-lg-5  mt-2 py-2 text-secondary position-absolute " style="left:2px ">
                    عرض اكثر
                </a>
        </div>
            <div class="owl-carousel product-carousel justify-content-center ltr mt-3">
                @forelse ($specialProducts as $specialProduct)
                <div class="border bg-soDark border-white rounded position-relative fruite-item rtl">
                    <a  href="/product/{{$specialProduct->id}}/{{$specialProduct->product_name}}">
                    @foreach ($specialProduct->images as $product_images)
                        @foreach ($product_images->path as $img)
                            @if ($loop->first)
                                <div class="fruite-img" style="border-radius: 0 0 0 45px;">
                                    <img src="{{asset("storage/$img")}}" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <div class="text-secondary bg-soDark px-3 py-1 rounded position-absolute"
                         style="top: 10px; right: 10px;">
                        {{$specialProduct->keyword}}</div>
                    <div class="p-4 rounded-bottom  product-body">
                        <h6 class="text-white product-name text-end">{{$specialProduct->product_name}}</h6>
                        <span class="text-white product-desc">{{$specialProduct->description}} </span>
                        <div class="d-flex justify-content-between flex-lg-wrap  mt-3">
                            <div class="mt-n1 ms-2 d-flex justify-content-end">
                                <span class="text-white fs-7 fw-bold">{{$specialProduct->new_price}}</span>
                                <del class="text-danger fs-8 p-1">{{$specialProduct->old_price}}</del>
                            </div>
                            <div class="d-flex justify-content-en flex-row-reverse ">
                                <i class="fas fs-7 fa-star text-secondary"></i>
                                <i class="fas fs-7 fa-star text-secondary"></i>
                                <i class="fas fs-7 fa-star text-secondary"></i>
                                <i class="fas fs-7 fa-star text-secondary"></i>
                                <i class="fas fs-7 fa-star"></i>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                            <div class="quick-view-element bg-secondary position-relative rounded-pill circle-h-w">
                                <div class="center quick-view-container" data-bs-toggle="modal" data-bs-target="#try-it">
                                    <h6 class="quick-view-text fs-5  text-white">جربها عليك</h6>
                                    <i class="fa fa-eye  fs-4 text-white"></i>
                                </div>
                            </div>
                            <div class="add-to-element bg-secondary position-relative rounded-pill circle-h-w">
                                <div class="center add-to-container " onclick="getProductQuickView({{$specialProduct->id}})">
                                    <h6 class="add-to-text fs-6   justify-content-start text-white" > اضافة الى السلة</h6>
                                    <i class="fa fa-shopping-cart fs-5 d-flex justify-content-end  text-white"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @empty
                <p>لاتوجد منتجات متاحة حاليا</p>
               @endforelse
            </div>

    </div>
</div>
<!-- Special  Shop End -->
