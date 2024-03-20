@yield('related_products')
<h1 class="fw-bold mb-0">منتجات ذات صلة</h1>
<div class="vesitable">
    <div class="owl-carousel product-carousel justify-content-center">
        @forelse ($relatedProducts as $relatedProduct)
            <div class="border border-white rounded position-relative fruite-item">
                @foreach ($relatedProduct->images as $product_images)
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
                    {{$relatedProduct->keyword}}</div>
                <div class="p-4 rounded-bottom">
                    <h6 class="text-soDark product-name text-end">{{$relatedProduct->product_name}}</h6>
                    <span class="product-desc">{{$relatedProduct->description}}</span>
                    <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                        <div class="py-2">
                            <span class="text-soDark fs-7 fw-bold">{{$relatedProduct->new_price}}</span>
                            <del class="text-danger fs-8 p-1">{{$relatedProduct->old_price}}</del>
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
                        <a href="/product/{{$relatedProduct->id}}/{{$relatedProduct->product_name}}" class="btn border border-dark bg-soDark rounded-pill w-75 text-secondary" onclick="getProductQuickView({{$relatedProduct->id}})" ><i
                                class="fa fa-shopping-cart me-2 text-secondary"></i>  اضافة الى السلة</a>
                        <i class="fa fa-eye  text-secondary  fa-2x mt-1 " ></i>

                    </div>
                </div>
            </div>
        @empty
            <p>لاتوجد منتجات متاحة حاليا</p>
        @endforelse
    </div>
</div>

