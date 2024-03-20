@yield('shopAside')
<div id="aside" class="col-md-3 col-md-pull-9 left-sidebar">
    <!-- aside Widget -->
    @foreach ($CurrentCategory as $category)
        <h2 class="">{{$category->category_name}}</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="row">
                @foreach ($category->sections as $section)
                    <a href="" style="margin-top:10px;margin-left:10px" class="btn btn-default  col-md-3 col-lg-3 col-sm-3 col-xs-4">{{$section->section_name}}</a>
                @endforeach
                @foreach ($categoryTypes as $type)
                    <a href=""  style="margin-top:10px;margin-left:10px" class="btn btn-default col-md-3 col-lg-3 col-sm-3 col-xs-4">{{$type->type_name}}</a>
                @endforeach
            </div>
       {{--     @foreach ($sectionTypes as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">{{$category->type_name.$category->category_name}}</a></h4>
                    </div>
                </div>
            @endforeach--}}
        </div><!--/category-products-->
        <!-- /aside Widget -->
@endforeach
<!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Brand</h3>
        <div class="checkbox-filter">
            <div class="input-checkbox">
                <input type="checkbox" id="brand-1">
                <label for="brand-1">
                    <span></span>
                    SAMSUNG
                    <small>(578)</small>
                </label>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="brand-2">
                <label for="brand-2">
                    <span></span>
                    LG
                    <small>(125)</small>
                </label>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="brand-3">
                <label for="brand-3">
                    <span></span>
                    SONY
                    <small>(755)</small>
                </label>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="brand-4">
                <label for="brand-4">
                    <span></span>
                    SAMSUNG
                    <small>(578)</small>
                </label>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="brand-5">
                <label for="brand-5">
                    <span></span>
                    LG
                    <small>(125)</small>
                </label>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="brand-6">
                <label for="brand-6">
                    <span></span>
                    SONY
                    <small>(755)</small>
                </label>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->

    <!-- /aside Widget -->
</div>

