@yield('brands')
<!-- International Brands Start-->
<div class="container-fluid fruite py">
    <div class="container p">
        <h1 class="mb-0"> ماركات عالمية</h1>
        <div class="owl-carousel brands-carousel justify-content-center">
            @forelse ($brands as $brand)
            <a href="/brand/{{$brand->id}}/{{$brand->brand_name}}" class="fruite-item">
                <div class="fruite-img">
                    <img src="{{asset("storage/$brand->brand_logo")}}" class="img-fluid w-100 rounded-top" alt="">
                </div>
            </a>
            @empty
                <p>لاتوجد ماركات متاحة حاليا</p>
            @endforelse
        </div>
    </div>
</div>
<!-- International Brands End -->
