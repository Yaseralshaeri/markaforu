
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROSS Glasses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontEnd/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('frontEnd/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/vendor/MagnificPopup/magnific-popup.css')}}">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontEnd/css/rs.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontEnd/css/font-awesome.min.css')}}">
    <link href="{{asset('frontEnd/css/single-product.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/si.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">
</head>

<body class="rtl">
<!-- HEADER -->

<header class="position-relative">
    @include('frontEnd.components.header')

</header>
<!-- /HEADER -->
<!--slider-->
@include('frontEnd.home.hero')
<!--/slider-->

<!--   Categories -->
<section class="categories c py-2">
    <div class="container-xl ">
        <div class="row m-1">
            <div class="col-lg-4 ">
               @include('frontEnd.home.ads')
            </div>
            <div class="col-lg-8">
                @include('frontEnd.home.categroies')
            </div>
        </div>
    </div>
</section>
<!-- /Categories -->

<!-- New Products -->
@include('frontEnd.home.newProducts')

<!-- /New Products -->

<!-- Brand Products -->
@include('frontEnd.home.specialProducts')
<!-- /Brand Products -->

<!--  banner SECTION -->
@include('frontEnd.home.banner')
<!-- /banner SECTION -->

<!-- populer SECTION -->
@include('frontEnd.home.bestSoledProducts')
<!-- /SECTION -->

<!-- recommended Products SECTION -->
@include('frontEnd.home.recommendedProducts')
<!-- /recommended Products -->

<!-- features  SECTION -->
@include('frontEnd.home.features')
<!-- /SECTION -->

<!-- Brands SECTION -->
@include('frontEnd.home.brands')
<!-- /SECTION -->


<!-- Tastimonial SECTION -->
@include('frontEnd.home.Tastimonial')
<!-- /SECTION -->
<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->
<!-- Modal -->
@include('frontEnd.components.quickView')
<!-- Modal end -->


<!-- Modal -->
@include('frontEnd.components.cartView')
<!-- Modal end -->

<!-- Modal -->
@include('frontEnd.components.progressBar')
<!-- Modal end -->
@include('notify::components.notify')


<!-- JavaScript Libraries -->
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontEnd/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontEnd/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontEnd/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('frontEnd/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontEnd/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontEnd/js/slick.min.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('frontEnd/js/main.js')}}"></script>
<script src="{{asset('frontEnd/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontEnd/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<!--===============================================================================================-->

<script>
    function zoomImages(){
            $('.product-main-image').zoom({url: $('.product-main-image img').attr('data-BigImgSrc')});
            $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    }
</script>
@yield('cartRequestScripts')
@yield('quickViewRequestScripts')
</body>

</html>
