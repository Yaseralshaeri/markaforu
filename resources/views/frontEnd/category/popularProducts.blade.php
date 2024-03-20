@yield('popularProducts')
        <!-- row -->
        <div class="row">
        @foreach ($getCategorySectionsPopularProducts as $category)
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">رائج هنا الان </h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active">
                                <a href="#allPopularProducts" data-toggle="tab">Home</a>
                            </li>
                            @foreach ($category->sections as $section)
                                <li><a href="{{'#'.$section->id*5639636887}}" data-toggle="tab">{{$section->section_name}}</a></li>
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
                        <div id="allPopularProducts" class="tab-pane fade in active">
                            <!-- product -->
                            @foreach ($getAllCategoryPopularProducts as $product)
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <div class="product">
                                        @foreach ($product->images->path as $product_imag)
                                            @if ($loop->first)
                                                <div class="product-img">
                                                    <img src="{{asset("storage/$product_imag")}}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span  class="new">NEW</span>
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
                                                <button class="quick-view" id="quick-view" value="{{$product->id}}"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                                <button class="add-to-compare" onclick="rr(6)"><i class="fa fa-shopping-cart"></i><span
                                                        class="tooltipp"> add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach
                        </div>
                        <!-- /tab -->
                        <!-- tab -->
                        @foreach ($category->sections as $section)
                                <div id="{{$section->id*5639636887}}" class="tab-pane fade">
                                <!-- product -->
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    @foreach ($section->products as $product)
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
                                                <h3 class="product-name"><a href="#">{{$section->section_name}}</a></h3>
                                                <h4 class="product-price"> {{$product->new_price.'00$'}}<del
                                                        class="product-old-price">{{$product->old_price.'00$'}}</del></h4>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="quick-view" id="quick-view" value="{{$product->id}}"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-shopping-cart"></i><span
                                                            class="tooltipp"> add to cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /product -->
                            </div>
                    @endforeach
                    <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
            @endforeach
        </div>
        <!-- /row -->
