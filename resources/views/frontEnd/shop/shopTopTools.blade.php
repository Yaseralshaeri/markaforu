@yield('shopTopTools')
<div class="row g-4 ltr">
    <div class="col-xl-3 ">
        <div class="input-group w-100 mx-auto d-flex">
            <input type="search" class="form-control p-3" placeholder="ابحث هتا"
                   aria-describedby="search-icon-1">
            <span id="search-icon-1" class="input-group-text p-3"><i
                    class="fa fa-search"></i></span>
        </div>
    </div>
    <div class="col-6"></div>
    <div class="col-xl-3 rtl">
        <div class="bg-light pe-3 py-3 rounded d-flex justify-content-between mb-4">
            <label for="orderby">ترتيب افتراضي:</label>
            <select class="form-select border-0 form-select-sm bg-light ms-3" name="orderby" id="orderby" >
                <option value="-1" {{ $order==-1? 'selected':''}}>افتراضي</option>
                <option value="1" {{ $order==1? 'selected':''}}>جديد</option>
                <option value="2" {{ $order==2? 'selected':''}}>من الاقدم الى الاحدث</option>
                <option value="3" {{ $order==3? 'selected':''}}>السعر من الاكثر الى الاقل</option>
                <option value="4" {{ $order==4? 'selected':''}}>السعر من الاكثر الى الاقل </option>
            </select>
        </div>
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

