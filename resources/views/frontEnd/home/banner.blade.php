@yield('banner')
<!-- Banner Section Start-->
@forelse ($indexBanner as $banner)
<div class="container-fluid banner bg-secondary my-5">
    @foreach ($banner->path as $img)
    <div class="container ">
        <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-2 fw-bold text-white">خليك انيق من اولها </h1>
                        <p class="fw-light display-5 text-primary mb-4">مع ماركة <span class="text-white">DIor</span> الان لدينا </p>
                        <p class="mb-4 text-dark">نص شكلي اي أن الغاية هي الشكل  نص شكلي اي أن الغاية هي الشكل  نص شكلي اي أن الغاية هي الشكل </p>
                        <div href="#"
                             class="banner-btn btn border-2 border-white rounded-pill py-3 px-5 " data-bs-toggle="modal" data-bs-target="#">تسوق الان</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset("storage/$img")}}" class="img-fluid w-100 rounded" alt="">
                </div>
        </div>
    </div>
    @endforeach

</div>
@empty
    <a>no</a>
@endforelse
<!-- Banner Section End -->
