@yield('shopTopTools')
<div class="row g-4 ltr">
    <div class="col-xl-5 col-md-5 col-12 ltr">
        <div class="input-group w-100 mx-auto d-flex">
            <input type="search" id="search_field" class="form-control p- rtl" placeholder="ابحث هتا"
                   aria-describedby="search-icon-1" @if($isCollection) value="{{$search_value}}" @endif >
            <span id="search_btn"  class="input-group-text p-"><i
                    class="fa fa-search"></i></span>
        </div>
    </div>
    <div class="col-lg-4 col-md-5 col-8  rtl mb-4">
        <div class="row mb-3 ">
            <label class="col-4  ps-0 pe-2 col-form-label">ترتيب المنتجات:</label>
            <div class="col-8">
                <select class="form-select" name="orderby" id="orderby"  aria-label="Default select example">
                    <option value="-1" {{ $order==-1? 'selected':''}}>افتراضي</option>
                    <option value="1" {{ $order==1? 'selected':''}}>جديد</option>
                    <option value="2" {{ $order==2? 'selected':''}}>من الاقدم الى الاحدث</option>
                    <option value="3" {{ $order==3? 'selected':''}}>السعر من الاكثر الى الاقل</option>
                    <option value="4" {{ $order==4? 'selected':''}}>السعر من الاكثر الى الاقل </option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-4 rtl"  data-bs-toggle="collapse" data-bs-target="#filter-collapseOne" aria-expanded="false" aria-controls="filter-collapseOne">
        <span class="fa fa-bars fa-2x text-dark"></span>
        <label class="fs-5  px-2 " style="line-height: 0;">            فلترة</label>

    </div>
</div>
<form id="frmFilter" method="GET">
    <input type="hidden" id="order" name="order" value="{{$order}}" />
    @if($isCategory)
        <input type="hidden" id="brands" name="brands" value="{{$q_brands}}" />
    @else
        @if($isCollection)
            <input type="hidden" id="brands" name="brands" value="{{$q_brands}}" />
        @endif
        <input type="hidden" id="Categories" name="Categories" value="{{$q_categories}}" />
    @endif
    <input type="hidden" id="sizes" name="sizes" value="{{$q_sizes}}" />
    <input type="hidden" id="colors" name="colors" value="{{$q_colors}}" />
    <input type="hidden" id="maxPrice" name="maxPrice" value="{{$q_maxPrice}}" />

</form>

<form id="frmSearch" method="GET" >
    <input type="hidden"  id="search_value" name="search_value" value="@if($isCollection) {{$search_value}} @endif" />
</form>
