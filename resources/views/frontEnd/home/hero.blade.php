@yield('hero') <div class="py-2 hero-header">
    <div class="containe">
        <div class="row m-0 g-5">
            <div class="col-md-12 col-lg-12">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($heroCarousel as $hero)
                        @foreach ($hero->path as $heroImage)
                            @if ($loop->first)
                                <div class="carousel-item active rounded">
                                    <img src="{{asset("storage/$heroImage")}}" class="img-fluid bg-secondary rounded" alt="First slide">
                                </div>
                            @else
                                    <div class="carousel-item rounded ">
                                        <img src="{{asset("storage/$heroImage")}}" class="img-fluid bg-secondary rounded" alt="First slide">
                                    </div>
                            @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
