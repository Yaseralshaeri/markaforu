@yield('sectionProducts')
<div id="store" class="col-md-9 col-md-push-3 ">
    <!-- store top filter -->
    <div class="store-filter clearfix">
        <div class="store-sort">
            <label>
                Sort By:
                <select class="input-select">
                    <option value="0">Popular</option>
                    <option value="1">Position</option>
                </select>
            </label>

            <label>
                Show:
                <select class="input-select">
                    <option value="0">20</option>
                    <option value="1">50</option>
                </select>
            </label>
        </div>
        <ul class="store-grid">
            <li class="active"><i class="fa fa-th"></i></li>
            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
        </ul>
    </div>
    <!-- /store top filter -->

    <!-- store products -->
    <div class="row">
        <!-- product -->
        @foreach ($getCategoryProducts as $product)
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
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
                        <h4 class="product-price">{{$product->new_price.'00$'}} <del class="product-old-price">{{$product->old_price.'00$'}}</del></h4>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="add-to-compare" onclick="get({{$product->id}})" id="quick-view" value=""><i class="fa fa-shopping-cart"></i><span
                                    class="tooltipp"> add to cart</span></button>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- /product -->
    </div>
    <!-- /store products -->
    <!-- store bottom filter -->
    <div class="store-filter clearfix">
        <span class="store-qty">Showing 20-100 products</span>
        <ul class="store-pagination">
            <li class="active">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
    <!-- /store bottom filter -->
    @include('frontEnd.category.popularProducts')

</div>

