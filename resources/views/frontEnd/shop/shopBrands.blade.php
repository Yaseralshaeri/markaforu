@yield('shopBrands')
<div class="col-lg-12 "  >

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h1 class="accordion-header" id="categories-accordion">
                <button class="price-accordion collapsed fs-4"  type="button" >
                    السعر
                </button>
            </h1>
            <div class="accordion-body">
                <input type="range" class="form-range w-100 " id="priceRange" name="priceRange"
                       min="10" max="500" value="{{$q_maxPrice}}" oninput="amount.value=priceRange.value" onchange="filterProductsByPrice(this)" >
                <output id="amount" name="amount" min-velue="10" max-value="500"
                        for="rangeInput" >{{$q_maxPrice}}   </output>ر.س
            </div>
        </div>
        @if(!$isCategory)
            <div class="accordion-item">
                <h1 class="accordion-header" id="categories-accordion">
                    <button class="accordion-button collapsed fs-4"  type="button" data-bs-toggle="collapse" data-bs-target="#categories-collapseOne" aria-expanded="false" aria-controls="categories-collapseOne">
                        الاقسام
                    </button>
                </h1>
                <div id="categories-collapseOne" aria-labelledby="categories-accordion" data-bs-parent="#accordionFlushExample" class="accordion-collapse collapse ">
                    <div class="mt-3">
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
            </div>
        @endif
        @if($isCategory || $isCollection)
        <div class="accordion-item">
            <h1 class="accordion-header" id="brands-accordion">
                <button class="accordion-button collapsed fs-4"  type="button" data-bs-toggle="collapse" data-bs-target="#brands-collapseOne" aria-expanded="false" aria-controls="brands-collapseOne">
                    ماركات عالمية
                </button>
            </h1>
            <div id="brands-collapseOne" aria-labelledby="brands-accordion" data-bs-parent="#accordionFlushExample" class="accordion-collapse collapse ">
                <div class="mt-3">
                    <ul class="brands_list ">
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
        @endif
            <div class="accordion-item">
                <h1 class="accordion-header" id="colors-accordion">
                    <button class="accordion-button collapsed fs-4"  type="button" data-bs-toggle="collapse" data-bs-target="#colors-collapseOne" aria-expanded="false" aria-controls="colors-collapseOne">
                        اللون
                    </button>
                </h1>
                <div id="colors-collapseOne" aria-labelledby="colors-accordion" data-bs-parent="#accordionFlushExample" class="accordion-collapse collapse ">
                    <div class="product_variant mt-3">
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
            <div class="accordion-item">
                <h1 class="accordion-header" id="sizes-accordion">
                    <button class="accordion-button collapsed fs-4"  type="button" data-bs-toggle="collapse" data-bs-target="#sizes-collapseOne" aria-expanded="false" aria-controls="sizes-collapseOne">
                        المقاس
                    </button>
                </h1>
                <div id="sizes-collapseOne" aria-labelledby="sizes-accordion" data-bs-parent="#accordionFlushExample" class="accordion-collapse collapse ">
                    <div class="product_variant mt-3">
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
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Accordion Item #1
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Accordion Item #2
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Accordion Item #3
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
            </div>
        </div>
    </div><!-- End Accordion without outline borders -->

@endif
