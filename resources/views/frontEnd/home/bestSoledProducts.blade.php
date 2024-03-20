@yield('bestSoledProducts')
<!-- Top soled Shop Start-->
<!-- Top soled  Start-->
<div class="container-fluid fruite py-1">
    <div class="container py-4">
        <div class="d-flex justify-content-between position-relative" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5); border--left-radius: 20%">
            <h1 class="mb-0">الاكثر مبيعا</h1>
            <a href="/char/TopSoledProducts/الاكثر مبيعا" class=" btn border border-secondary rounded-pill px-3 px-lg-5  mt-2 py-2 text-secondary position-absolute " style="left:2px ">
                عرض اكثر
            </a>
        </div>
        <div class="owl-carousel  product-carousel justify-content-center mt-3">
            @forelse ($topSoldProducts as $topSoldProduct)
                <div class="border border-white rounded position-relative fruite-item">
                    <a  href="/product/{{$topSoldProduct->id}}/{{$topSoldProduct->product_name}}">
                    @foreach ($topSoldProduct->images as $product_images)
                        @foreach ($product_images->path as $img)
                            @if ($loop->first)
                                <div class="fruite-img" style="border-radius: 0 0 0 35px;">
                                    <img src="{{asset("storage/$img")}}" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <div class="text-secondary bg-soDark px-3 py-1 rounded position-absolute"
                         style="top: 10px; right: 10px;">
                        {{$topSoldProduct->keyword}}</div>
                    <div class="p-4 rounded-bottom">
                        <h6 class="text-soDark product-name text-end">{{$topSoldProduct->product_name}}</h6>
                        <span class="product-desc">{{$topSoldProduct->description}}</span>
                        <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                            <div class="py-2">
                                <span class="text-soDark fs-7 fw-bold">{{$topSoldProduct->new_price}}</span>
                                <del class="text-danger fs-8 p-1">{{$topSoldProduct->old_price}}</del>
                            </div>
                            <div class="d-flex justify-content-end py-3 flex-row-reverse">
                                <i class="fas fs-8 fa-star text-secondary"></i>
                                <i class="fas fs-8 fa-star text-secondary"></i>
                                <i class="fas fs-8 fa-star text-secondary"></i>
                                <i class="fas fs-8 fa-star text-secondary"></i>
                                <i class="fas fs-8 fa-star"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <a href="#" class="btn border border-dark bg-soDark rounded-pill w-75 text-secondary" onclick="getProductQuickView({{$topSoldProduct->id}})" ><i
                                    class="fa fa-shopping-cart me-2 text-secondary" ></i>  اضافة الى السلة</a>
                            <i class="fa fa-eye  text-secondary  fa-2x mt-1 " data-bs-toggle="modal" data-bs-target="#try-it"></i>

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
<!-- Top soled  Shop End --><!-- Top soled  Shop End -->
