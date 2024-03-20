@yield('shopPrice')
<div class="col-lg-12">
    <div class="mb-3">
        <h4 class="mb-2">السعر</h4>
        <input type="range" class="form-range w-100 " id="priceRange" name="priceRange"
               min="10" max="500" value="{{$q_maxPrice}}" oninput="amount.value=priceRange.value" onchange="filterProductsByPrice(this)" >
        <output id="amount" name="amount" min-velue="10" max-value="500"
                for="rangeInput" >{{$q_maxPrice}}   </output>ر.س
    </div>
</div>
