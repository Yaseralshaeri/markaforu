@yield('header')    <!-- Spinner Start -->
<div id="spinner"
     class="show  w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-dark" role="status"></div>
</div>
<!-- Spinner End -->
<!-- Navbar start -->
<div class="container-fluid fixed-top ">
    <div class="container topbar bg-dark d-none d-lg-block mt-1">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                                                                                                 class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                                                                                          class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">سياسة الخصوصية</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">شروط الاستخدام</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">الاستبدال والاسترجاع</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="/" class="navbar-brand">
                <h1 class="text-dark display-6">
                    <i class="fas  text-secondary fa-glasses me-2"></i>
                    ROSS Glasses
                </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-dark"></span>
            </button>
            <div class="collapse navbar-collapse bg-white " id="navbarCollapse">
                <div class="navbar-nav mx-auto ">
                    <a href="/" class="nav-item nav-link active">الرئيسية</a>
                    @foreach ($categories as  $category)
                        <a href="/category/{{$category->id}}/{{$category->category_name}}" class="nav-item nav-link">{{$category->category_name}}</a>
                    @endforeach
                    <div class="nav-item dropdown rtl">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ماركات عالمية</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0 rtl">
                            @foreach ($brands as  $brand)
                                <a href="/brand/{{$brand->id}}/{{$brand->brand_name}}" class="dropdown-item">{{$brand->brand_name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="nav-item dropdown rtl">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> تسوق حسب</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0 rtl">
                            <a href="/char/NewProducts/جديدنا" class="dropdown-item"> جديد</a>
                            <a href="/char/TopSoledProducts/الاكثر مبيعا" class="dropdown-item"> الاكثر مبيعا</a>
                            <a href="/char/RecommendedProducts/موصى به" class="dropdown-item">موصى به</a>
                        @foreach ($collections as  $collection)
                                <a href="/brand/{{$collection->id}}/{{$collection->collection_name}}" class="dropdown-item">{{$collection->collection_name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="/char/Discounts/تخفيضات" class="nav-item nav-link text-danger"> تخفيضات</a>
                    <a href="/contact.html" class="nav-item nav-link">تواصل معنا</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button
                        class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal" data-bs-target="#searchModal"><i
                            class="fas fa-search text-secondary"></i>
                    </button>
                    <a href="#" class="position-relative me-4 my-auto" data-bs-toggle="modal"
                       data-bs-target="#myCart">
                        <i class="fas fa-shopping-cart text-secondary  fa-2x"></i>
                        <span  id="cart_count_header" class="position-absolute bg-primary rounded-circle d-flex align-items-center justify-content-center text-secondary px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{$hasCart}}</span>
                    </a>
                    <a href="#" class="my-auto me-4">
                        <i class="fas fa-user text-primary fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<div class="modal fade ltr" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ابحث </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" id="top_search_field"  class="form-control p-3" placeholder="ابحث هنا"
                           aria-describedby="search-icon-1">
                    <span id="topSearch"  class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>


<form id="topfrmSearch" method="GET" >
    <input type="hidden"  id="top_search_value" name="search_value" value="" />
</form>
<!-- Modal Search End -->


