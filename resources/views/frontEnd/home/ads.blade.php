@yield('ads')
@forelse($indexAds as  $indexAd)
    <div class="box bg-soDark mb-1 ltr">
        <div class="img-box">
            <img src="{{asset("storage/").'/'.$indexAd->media->path}}" class="img-fluid w-100 h-100" alt="">
        </div>
        <div class="detail-box">
            <h5>
               {{$indexAd->ads_name}}
            </h5>
            <h6>
                {{$indexAd->note}}
            </h6>
             @if(count($indexAd->products)==1)
                 @foreach($indexAd->products as $product)
                <a href="/product/{{$product->id}}/{{$product->product_name}}">
                    شراء الان
                </a>
                @endforeach
            @endif
            @if(count($indexAd->products)>1)
                <a href="/advertisement/{{$indexAd->id}}/{{$indexAd->ads_name}}">
                    تسوق الان
                </a>
            @endif
            @if(count($indexAd->products)==0)
                <p class="btn border border-secondary p-3 text-secondary  mt-3 mb-0" >
                       تسوق الان معنا وخليك رابح
                </p>
            @endif
        </div>
    </div>
@empty
@endforelse

