<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROSS Glasses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
    <link href="{{asset('frontEnd/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/single-product.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/si.css')}}" rel="stylesheet">
</head>

<body class="rtl">
<!-- HEADER -->
<header>
    @include('frontEnd.components.header')
</header>
<!-- /HEADER -->
<!--slider-->
@include('frontEnd.components.singelPageHeader')
<!--/slider-->

<!--  Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">{{$shopName}}</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                @include('frontEnd.shop.shopTopTools')
                <div class="row g-4 ">
                    <div class="col-lg-9">
                        @include('frontEnd.shop.shopProducts')
                    </div>
                    <div class="col-lg-3 ">
                        <div class="row g-4">
                            @include('frontEnd.shop.shopCategories')
                            @include('frontEnd.shop.shopPrice')
                            @include('frontEnd.shop.shopBrands')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Shop End-->








<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->
<!-- Modal -->
@include('frontEnd.components.quickView')
<!-- Modal end -->


<!-- Modal -->
@include('frontEnd.components.cartView')
<!-- Modal end -->



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
<script src="{{asset('frontEnd/js/slicks.js')}}"></script>
<script src="{{asset('frontEnd/js/slick-custom.js')}}"></script>

<!--===============================================================================================-->
<script src="{{asset('frontEnd/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}">

</script>
<script>
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
</script>
<!--===============================================================================================-->
<script>
    $("#orderby").on("change",function(){
        $("#order").val($("#orderby option:selected").val());
        $("#frmFilter").submit();
    });

    function filterProductsByCategory(Category){
        var Categories = "";
        $("input[name='categories']:checked").each(function(){
            if(Categories=="")
            {
                Categories += this.value;
            }
            else{
                Categories += "," + this.value;
            }
        });
        $("#Categories").val(Categories);
        $("#frmFilter").submit();
    }
    function filterProductsByBrand(brand){
        var brands = "";
        $("input[name='brands']:checked").each(function(){
            if(brands=="")
            {
                brands += this.value;
            }
            else{
                brands += "," + this.value;
            }
        });
        $("#brands").val(brands);
        $("#frmFilter").submit();
    }

    function filterProductsBySize(size){
        var sizes = "";
        $("input[name='sizes']:checked").each(function(){
            if(sizes=="")
            {
                sizes += this.value;
            }
            else{
                sizes += "," + this.value;
            }
        });
        $("#sizes").val(sizes);
        $("#frmFilter").submit();
    }
    function filterProductsByColor(color){
        var colors = "";
        $("input[name='colors']:checked").each(function(){
            if(colors=="")
            {
                colors += this.value;
            }
            else{
                colors += "," + this.value;
            }
        });
        $("#colors").val(colors);
        $("#frmFilter").submit();
    }
    function filterProductsByPrice(price){
        let priceRange = "";
        priceRange =$("input[name='priceRange']").val()
        $("#maxPrice").val(priceRange);
        $("#frmFilter").submit();
    }

</script>
</body>

</html>
