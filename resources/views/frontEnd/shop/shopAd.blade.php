@yield('shopAd')
@forelse ($sidebarAds as $sidebarAd)

<div class="col-lg-12">
    <div class="position-relative">
        <img src="{{asset("storage/").'/'.$sidebarAd->media->path}}" class="img-fluid w-100 " alt="">
        <div class="position-absolute"
             style="top: 62%; left:30%; ">
            <a href="" class="btn bg-transparent border-dark py-2 px-4  text-dark ">Buy Now</a>

        </div>
    </div>
</div>
@empty
    <p>لاتوجد منتجات متاحة حاليا</p>
@endforelse

