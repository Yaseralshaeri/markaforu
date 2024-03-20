@yield('shopProducts')
<div class="row g-4 justify-content-center" id="products_container">
    @forelse ($products as $product)
        <div  class="col-md-6 col-6 col-sm-6 col-lg-4 col-xl-4">
            <a  href="/product/{{$product->id}}/{{$product->product_name}}">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img position-relative" >
                    @foreach ($product->images as $product_images)
                        @if ($loop->first)
                           @foreach ($product_images->path as $img)
                                @if ($loop->first)
                                <img src="{{asset("storage/$img")}}" class="img-fluid w-100 h-100 rounded-top " alt="">
                                @endif
                                    <i class=" rtl try-icon fa fa-eye bg-primary fs-5 py-2-5 rounded-pill position-absolute fa-lg   text-secondary  rounded position-absolute"
                                       data-bs-toggle="modal" data-bs-target="#try-it" > جربها عليك
                                    </i>
                           @endforeach
                        @endif
                    @endforeach
                        <div class="position-absolute " id="colors"  style="top:88%; right:1%;">
                            @foreach ($product->images as $product_images)
                                <li class="mx-2 mt-2 px- pb-3 d-inline-block position-relative  item_color" >
                                    <input type="checkbox" id="productColor" value="{{$product_images->color->color_hex}}">
                                    <span class="checkmark" style="width:15px;height:15px;background-color:{{$product_images->color->color_hex}}" ></span>
                                </li>
                            @endforeach
                        </div>
                        <div class="position-absolute "  style="bottom:1%; left:1%;">
                            @foreach ($product->images as $product_images)
                                @foreach ($product_images->path as $img)
                                    <li class="mx- mt-2 px- pb-3 d-inline-block position-relative  item_color" >
                                        <img src="{{asset("storage/$img")}}" class="checkmark border border-2 border-white  rounded-circle" style="width:25px;height:25px;">
                                    </li>
                                @endforeach
                            @endforeach
                        </div>
                </div>

                <div  class=" text-secondary fa-sm  product-label  bg-soDark px-2 px-md-3 py-1 rounded position-absolute d-flex justify-content-between js-show-modal1">
                    {{$product->keyword}}
                </div>
                <i class=" fa fa-heart-o  position-absolute fa-lg   text-dark rounded position-absolute"
                   style="top:15px; left:80%;"></i>
                <div class="p-2 p-md-4 border border-white border-top-0 rounded-bottom">

                    <h6 class="text-soDark product-name text-end"> {{$product->product_name}}</h6>
                    <span class="product-desc"> {{$product->description}}</span>
                    <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                        <div class="py-2">
                            <label class="text-soDark fs-7 fw-bold"> {{$product->new_price}}</label>
                            <del class="text-danger fs-8 p-1"> {{$product->old_price}}</del>
                        </div>
                        <div class="d-flex justify-content-end my-2">
                            <i style="font-size:.90rem ;"
                               class="text-soDark  mt-1  fw-bold">5</i>
                            <i style="font-size:.70rem ;"
                               class="fas f  pt-2 mx-1 fa-star text-secondary"></i>
                        </div>
                    </div>
                    <a href="#"
                       class="js-show-modal1 btn border border-dark rounded-pill w-100 mt-1 bg-primary  text-secondary" >
                        اضافة الى السلة
                        <i class="fa fa-shopping-cart me-2 text-secondary"></i>
                    </a>
                </div>

            </div>
            </a>
        </div>
    @empty
        <p>لاتوجد منتجات متاحة حاليا</p>
    @endforelse
    <div class="col-12">
        <div class="pagination d-flex justify-content-center ltr mt-5">
                {!!$products->links()!!}
        </div>
        {{$products->count()}}
    </div>
</div>
