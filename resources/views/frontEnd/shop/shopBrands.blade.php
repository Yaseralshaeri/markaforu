@yield('shopBrands')
<div class="col-lg-12">
    <div class="mb-3">
        @if($isCategory)
            <h4>ماركات عالمية</h4>
            <div class="">
                <div class=" d-flex align-items-center">
                    <ul class="brands_list">
                        @forelse ($brands as $brand)
                            <li class="m-1 btn border border-dark  text-dark px-2 my-1 position-relative @if(in_array($brand->id,explode(',',$q_brands))) bg-dark text-white @endif"  >
                                <input type="checkbox"  class="brand_checkbox position-absolute p-4" id="br-{{$brand->id}}" @if(in_array($brand->id,explode(',',$q_brands))) checked="checked" @endif name="brands" value="{{$brand->id}}" onchange="filterProductsByBrand(this)">
                                <span class="checkmark"  style="height: 2rem;width: 3rem"  >{{$brand->brand_name}}</span>
                            </li>
                        @empty
                            <p>لاتوجد ماركات متاحة حاليا</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        @else
            <h4>الاقسام</h4>
            <div class="fruite-name">
                <div class=" d-flex align-items-center">
                    <ul class="brands_list">
                        @forelse ($categories as $category)
                            <li class="m-1 btn border border-dark  text-dark px-2 my-1 position-relative @if(in_array($category->id,explode(',',$q_categories))) bg-dark text-white @endif">
                                <input type="checkbox"  class="brand_checkbox position-absolute p-4" id="ct-{{$category->id}}" @if(in_array($category->id,explode(',',$q_categories))) checked="checked" @endif name="categories" value="{{$category->id}}" onchange="filterProductsByCategory(this)">
                                <span class="checkmark"  style="height: 2rem;width: 3rem"  >{{$category->category_name}}  <i class="fas  fa-glasses me-2"></i></span>
                            </li>
                        @empty
                            <p>لاتوجد اقسام متاحة حاليا</p>
                        @endforelse
                    </ul>
                </div>

            </div>
        @endif
    </div>
</div>
<div class="col-lg-12">
    <div class="mb-1">
        <h4>اللون</h4>
        <div class="product_variant">
            <div class="filter__list widget_color d-flex align-items-center">
                <ul>
                    @foreach($colors as $color )
                        <li class="m-1">
                            <input type="checkbox" value="{{$color->id}} " class="p-4" id="cl-{{$color->id}}" @if(in_array($color->id,explode(',',$q_colors))) checked="checked" @endif name="colors" onchange="filterProductsByColor(this)">
                            <span class="checkmark" style="width: 40px;height: 40px;background-color:{{$color->color_hex}}" ></span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
<div class="col-lg-12">
    <div class="mb-1">
        <h4>المقاس</h4>
        <div class="product_variant">

            <div class="filter__list widget_color d-flex align-items-center">
                <ul>
                    @foreach($sizes as $size )
                        <li class="m-1">
                            <input type="checkbox"  class="p-4" id="sz-{{$size->id}}" @if(in_array($size->id,explode(',',$q_sizes))) checked="checked" @endif name="sizes" value="{{$size->id}}" onchange="filterProductsBySize(this)">
                            <span class="checkmark text-center pt-1  @if(in_array($size->id,explode(',',$q_sizes))) bg-dark text-white @endif"  style="width: 40px;height: 40px;background-color: #f1f1f1;color: #999999" >{{$size->size}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@if($isCollection)
    <div class="col-lg-12">
        <div class="mb-1"> <h4>ماركات عالمية</h4>
            <div class="">
                <div class=" d-flex align-items-center">
                    <ul class="brands_list">
                        @forelse ($brands as $brand)
                            <li class="m-1 btn border border-dark  text-dark px-2 my-1 position-relative @if(in_array($brand->id,explode(',',$q_brands))) bg-dark text-white @endif"  >
                                <input type="checkbox"  class="brand_checkbox position-absolute p-4" id="br-{{$brand->id}}" @if(in_array($brand->id,explode(',',$q_brands))) checked="checked" @endif name="brands" value="{{$brand->id}}" onchange="filterProductsByBrand(this)">
                                <span class="checkmark"  style="height: 2rem;width: 3rem"  >{{$brand->brand_name}}</span>
                            </li>
                        @empty
                            <p>لاتوجد ماركات متاحة حاليا</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endif
