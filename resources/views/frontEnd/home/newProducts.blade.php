@yield('newProducts')
<!-- new Products Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-3 text-end">
                    <h1>جديدنا</h1>
                </div>
                <div class="col-lg-9 col-md text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active pd-ssm-tap" data-bs-toggle="pill"
                               href="#tab-19d090t5629f36">
                                <span class="text-dark px-4">كل المنتجات </span>
                            </a>
                        </li>
                        @foreach ($categories as  $category)
                            <a href="shop/{{$category->id}}" class="nav-item nav-link"></a>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill pd-ssm-tap" data-bs-toggle="pill"
                                   href="#{{'tab-'.$category->id*863749673}}">
                                    <span class="text-dark px-4">{{$category->category_name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-19d090t5629f36" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                                <div class="row g-3">
                                    @forelse ($newProducts as $newProduct)
                                    <div class="col-md-6 col-6 col-sm-6 col-lg-4 col-xl-3 ">
                                      <a  href="/product/{{$newProduct->id}}/{{$newProduct->product_name}}">
                                          <div class="rounded position-relative fruite-item">
                                            @foreach ($newProduct->images as $product_images)
                                                @foreach ($product_images->path as $img)
                                                @if ($loop->first)
                                                    <div class="fruite-img position-relative" >
                                                        <img src="{{asset("storage/$img")}}" class="img-fluid w-100 h-100 rounded-top " alt="">
                                                        <p class="ltr try-icon fa fa-eye bg-primary fs-5 py-2-5 rounded-pill position-absolute fa-lg   text-secondary  rounded position-absolute"
                                                           data-bs-toggle="modal" data-bs-target="#try-it" > جربها عليك
                                                        </p>
                                                    </div>
                                                @endif
                                                @endforeach
                                            @endforeach
                                                <div  class=" fa-sm  product-label  text-secondary  bg-soDark px-2 px-md-3 py-1 rounded position-absolute d-flex justify-content-between ">
                                               {{$newProduct->keyword}}
                                            </div>
                                            <i class=" fa fa-heart-o  position-absolute fa-lg   text-dark rounded position-absolute"
                                               style="top:15px; left:80%;"></i>
                                            <div class=" p-2 p-md-4 border border-white border-top-0 rounded-bottom">
                                                <h6 class="text-soDark product-name text-end"> {{$newProduct->product_name}}</h6>
                                                <span class="product-desc"> {{$newProduct->description}}</span>
                                                <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                                                    <div class="py-2">
                                                        <span class="text-soDark fs-7 fw-bold"> {{$newProduct->new_price}}  ر.س </span>
                                                        <del class="text-danger fs-8 p-1"> {{$newProduct->old_price}}  ر.س </del>
                                                    </div>
                                                    <div class="d-flex justify-content-end my-2">
                                                        <i style="font-size:.90rem ;"
                                                           class="text-soDark  mt-1  fw-bold">5</i>
                                                        <i style="font-size:.70rem ;"
                                                           class="fas f  pt-2 mx-1 fa-star text-secondary"></i>
                                                    </div>
                                                </div>
                                                <a
                                                   class=" btn border border-dark rounded-pill w-100 mt-1 bg-primary  text-secondary" onclick="getProductQuickView({{$newProduct->id}})">
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
                                </div>
                        </div>
                    </div>
                    <div class="row mt-3 pe-5 ">
                        <div class="col-8 col-md-9 " style="border-bottom: 1px solid rgba(226, 175, 24, 0.5); "></div>
                        <div class="col-4 col-md-3">
                            <a href="char/NewProducts/جديدنا" class=" btn  border-secondary rounded-pill w-100 mt-1  py-2 text-secondary show-moore-btn" >
                                عرض اكثر
                            </a>
                        </div>
                    </div>

                </div>
                @foreach ($categoryNewProducts as  $categoryNewProduct)
                <div id="{{'tab-'.$categoryNewProduct->id*863749673}}" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-3">
                                @forelse ($categoryNewProduct->products as $newProduct)
                                    <div class="col-md-6 col-6 col-sm-6 col-lg-4 col-xl-3 ">
                                        <a  href="/product/{{$newProduct->id}}/{{$newProduct->product_name}}">
                                        <div class="rounded position-relative fruite-item">
                                            @foreach ($newProduct->images as $product_images)
                                                @foreach ($product_images->path as $img)
                                                    @if ($loop->first)
                                                        <div class="fruite-img position-relative" >
                                                            <img src="{{asset("storage/$img")}}" class="img-fluid w-100 h-100 rounded-top " alt="">
                                                            <i class=" ltr try-icon fa fa-eye bg-primary fs-5 py-2-5 rounded-pill position-absolute fa-lg   text-secondary  rounded position-absolute"
                                                               data-bs-toggle="modal" data-bs-target="#try-it" > جربها عليك
                                                            </i>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <div  class=" text-secondary fa-sm  product-label  bg-soDark px-2 px-md-3 py-1 rounded position-absolute d-flex justify-content-between">
                                                {{$newProduct->keyword}}
                                            </div>
                                            <i class=" fa fa-heart-o  position-absolute fa-lg   text-dark rounded position-absolute"
                                               style="top:15px; left:80%;"></i>
                                            <div class=" p-2 p-md-4 border border-white border-top-0 rounded-bottom">
                                                <h6 class="text-soDark product-name text-end"> {{$newProduct->product_name}}</h6>
                                                <span class="product-desc"> {{$newProduct->description}}</span>
                                                <div class="d-flex justify-content-between flex-lg-wrap   px-md">
                                                    <div class="py-2">
                                                        <span class="text-soDark fs-7 fw-bold"> {{$newProduct->new_price}} ر.س </span>
                                                        <del class="text-danger fs-8 p-1"> {{$newProduct->old_price}}  ر.س  </del>
                                                    </div>
                                                    <div class="d-flex justify-content-end my-2">
                                                        <i style="font-size:.90rem ;"
                                                           class="text-soDark  mt-1  fw-bold">5</i>
                                                        <i style="font-size:.70rem ;"
                                                           class="fas f  pt-2 mx-1 fa-star text-secondary"></i>
                                                    </div>
                                                </div>
                                                <a
                                                   class=" btn border border-dark rounded-pill w-100 mt-1 bg-primary  text-secondary" onclick="getProductQuickView({{$newProduct->id}})" >
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
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 pe-5 ">
                        <div class="col-8 col-md-9 " style="border-bottom: 1px solid rgba(226, 175, 24, 0.5); "></div>
                        <div class="col-4 col-md-3">
                            <a href="/category/{{$categoryNewProduct->id}}/{{$categoryNewProduct->category_name}}" class=" btn  border-secondary rounded-pill w-100 mt-1  py-2 text-secondary show-moore-btn" >
                                عرض اكثر
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- new Products Shop End-->
