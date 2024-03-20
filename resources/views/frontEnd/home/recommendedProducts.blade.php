@yield('recommendedProducts')
<!-- recommended Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">منتجات مختارة</h1>
            <p>  منتجات تم اختيارها والتوصية بها من قبل عملائنا المتميزون
        </div>
        <div class="row g-4">
                @forelse ($recommendedProducts as $recommendedProduct)
                <div class="col-md-6 col-xl-4">
                    <div class="pt-4 py3 pe-3 ps-3  rounded bg-soDark recomnded-item position-relative">
                        <div class="position-absolute try-icon border border-secondary  px-2 py-1" data-bs-toggle="modal" data-bs-target="#try-it" >
                            <span class="px-1 text-secondary mt-n2">جربها الان </span>
                            <i class="fa fs-4 fa-eye text-secondary mt-"></i>
                        </div>
                        <div class="row align-items-center  ltr  ">
                            @foreach ($recommendedProduct->images as $product_images)
                                @foreach ($product_images->path as $img)
                                    @if ($loop->first)
                                        <div class="col-6  pb-3 border- mt-3"  >
                                            <img src="{{asset("storage/$img")}}" class="img-fluid rounded-circle w-100 mt-1"
                                                 style="border: 5px solid #ffbe33;" alt="">
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            <div class="col-6 brands rtl">
                                <h6 class="text-white product-name text-end pe-2">{{$recommendedProduct->product_name}}</h6>
                                <div class="d-flex justify-content-between flex-lg-wrap px-md py-2">
                                    <div class="d-flex justify-content-end my-2">
                                        <i style="font-size:.70rem ;"
                                           class="fas f  pt-2 mx-1 fa-star text-secondary"></i>
                                        <i style="font-size:.90rem ;"
                                           class="text-secondary  mt-1  fw-bold">5</i>
                                    </div>
                                    <div class="py-2">
                                        <span class="text-white fs-7 fw-bold">{{$recommendedProduct->new_price}}</span>
                                        <del class="text-danger fs-8 p-1">{{$recommendedProduct->old_price}}</del>
                                    </div>
                                </div>
                                <a href="#"
                                   class=" btn custom-btn-sz bg-soDark border border-secondary rounded-pill px-3 text-secondary mb-0" onclick="getProductQuickView({{$recommendedProduct->id}})">
                                    اضافة الى السلة
                                    <i
                                        class="fa fa-shopping-cart me-1 text-secondary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p>لاتوجد منتجات متاحة حاليا</p>
                @endforelse
        </div>
        <div class="ltr mt-2">
                {!!$recommendedProducts->links()!!}
        </div>

</div>
</div>
<!-- recommended Product End -->
