@yield('shopFeaturesProducts')
<div class="col-lg-12 pt-2 featured-side mt-2">
    <h4 class="mb-3">منتجات مختارة</h4>
    @forelse ($recommendedProducts as $recommendedProduct)
    <div class="d-flex align-items-center justify-content-start my-2">
        @foreach ($recommendedProduct->images as $product_images)
            @foreach ($product_images->path as $img)
                @if ($loop->first)
                    <div class="rounded ms-4" style="width: 100px; height: 100px; ">
                        <img src="{{asset("storage/$img")}}" class="img-fluid rounded-circle w-100 mt-1" alt="">
                    </div>
                @endif
            @endforeach
        @endforeach
        <div>
            <h6 class="mb-2">{{$recommendedProduct->product_name}}</h6>
            <div class="d-flex mb-2">
                <i class="fa fa-star text-secondary"></i>
                <i class="fa fa-star text-secondary"></i>
                <i class="fa fa-star text-secondary"></i>
                <i class="fa fa-star text-secondary"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="d-flex mb-2">
                <h5 class="fw-bold ms-2">{{$recommendedProduct->new_price}}</h5>
                <h5 class="text-danger text-decoration-line-through">{{$recommendedProduct->old_price}}</h5>
            </div>
        </div>
    </div>
         @if($loop->last)
            <div class="d-flex justify-content-center my-4">
                <a href="#"
                   class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                    More</a>
            </div>
        @endif

    @empty
        <p>لاتوجد منتجات متاحة حاليا</p>
    @endforelse
</div>
