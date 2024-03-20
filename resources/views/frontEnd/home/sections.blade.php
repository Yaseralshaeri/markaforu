@yield('sections')
@foreach ($sections as $section)
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">{{$section->section_name}}</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#allSectionPrpducts">all</a></li>
                                @foreach ($section->categories as $category)
                                    <li><a data-toggle="tab" href="{{'#'.$category->id*56396887}}">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="allSectionPrpducts" class="tab-pane fade in active">
                                <div class="products-slick col-lg-3 col-sm-6 col-md-4 col-xs-12"  data-nav="#slick-nav-2">
                                @foreach ($section->products as $product)
                                    <!-- product -->
                                        <div class="product">
                                            @foreach ($product->images->path as $product_imag)
                                                @if ($loop->first)
                                                    <div class="product-img">
                                                        <img src="{{asset("storage/$product_imag")}}" alt="">
                                                        <div class="product-label">
                                                            <span class="sale">-30%</span>
                                                            <span class="new">NEW</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                                                <h4 class="product-price"> {{$product->new_price.'00$'}}<del
                                                        class="product-old-price">{{$product->old_price.'00$'}}</del></h4>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-shopping-cart"></i><span
                                                            class="tooltipp"> add to cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                            <!-- /tab -->
                            <!-- tab -->
                            @foreach ($categoryProducts as $categoryProduct)
                                <div id="{{$categoryProduct->id*235532}}" class="tab-pane fade">
                                    <!-- product -->
                                    <div class="col-lg-3 col-md-4 col-xs-6">
                                        @foreach ($categoryProduct->products as $product)
                                            <div class="product">
                                                <div class="product-img">
                                                    @foreach ($product->images->path as $product_imag)
                                                        @if ($loop->last)
                                                            <img src="{{asset("storage/$product_imag")}}" alt="">
                                                            <div class="product-label">
                                                                <span class="sale">-30%</span>
                                                                <span class="new">NEW</span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                                                    <h4 class="product-price"> {{$product->new_price.'00$'}}<del
                                                            class="product-old-price">{{$product->old_price.'00$'}}</del></h4>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                                class="tooltipp">add to wishlist</span></button>
                                                        <button class="quick-view" id="quick-view" value="{{$product->id}}"><i class="fa fa-eye"></i><span
                                                                class="tooltipp"  >quick view</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-shopping-cart"></i><span
                                                                class="tooltipp"> add to cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /product -->
                                </div>
                                <!-- /tab -->
                            @endforeach

                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endforeach
