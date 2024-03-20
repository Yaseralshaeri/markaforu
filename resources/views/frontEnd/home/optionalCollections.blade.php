@yield('optionalCollections')
<!-- Top soled Shop Start-->
<!-- Top soled  Start-->
@forelse ($collectionsProducts as $collection)
<div class="container-fluid fruite py-1">
    <div class="container py-4">
        <h1 class="mb-0">{{$collection->collection_name}} </h1>
        <div class="owl-carousel  product-carousel justify-content-center">
            @if(count($collection->products)>0)
            @foreach($collection->products as $product)
                <div class="border border-white rounded position-relative fruite-item">
                    @foreach ($product->images as $product_images)
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
                        {{$product->keyword}}</div>
                    <div class="p-4 rounded-bottom">
                        <h6 class="text-soDark product-name text-end">{{$product->product_name}}</h6>
                        <span class="product-desc">{{$product->description}}</span>
                        <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                            <div class="py-2">
                                <span class="text-soDark fs-7 fw-bold">{{$product->new_price}}</span>
                                <del class="text-danger fs-8 p-1">{{$product->old_price}}</del>
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
                            <a href="#" class="js-show-modal1 btn border border-dark bg-soDark rounded-pill w-75 text-secondary" ><i
                                    class="fa fa-shopping-cart me-2 text-secondary"></i>  اضافة الى السلة</a>
                            <i class="fa fa-eye  text-secondary  fa-2x mt-1 " data-bs-toggle="modal" data-bs-target="#try-it"></i>

                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p>لاتوجد منتجات متاحة حاليا</p>
            @endif
        </div>
    </div>
</div>
@empty
    <p>لاتوجد منتجات  {{$collection->collection_name}}متاحة حاليا</p>
@endforelse
<!-- Top soled  Shop End --><!-- Top soled  Shop End -->
