@extends('frontEnd.components.cartView')
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

@include('frontEnd.cart.cartItems')
<!-- Single Product Start -->


<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->
<!-- Modal -->
@include('frontEnd.components.quickView')
<!-- Modal end -->


<!-- Modal -->
@include('frontEnd.components.cartView')
<!-- Modal end -->


<!-- cart  icon  -->


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
</body>
<script>
    var currentStep = 1;
    var updateProgressBar;

    function displayStep(stepNumber) {
        if (stepNumber >= 1 && stepNumber <= 3) {
            $(".step-" + currentStep).hide();
            $(".step-" + stepNumber).show();
            currentStep = stepNumber;
            updateProgressBar();
        }
    }

    $(document).ready(function() {
        $('#multi-step-form').find('.step').slice(1).hide();

        $(".next-step").click(function() {
            if (currentStep < 3) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                currentStep++;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                    updateProgressBar();
                }, 500);
            }
        });

        $(".prev-step").click(function() {
            if (currentStep > 1) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                currentStep--;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                    updateProgressBar();
                }, 500);
            }
        });

        updateProgressBar = function() {
            var progressPercentage = ((currentStep - 1) / 2) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        }
    });
</script>
@yield('cartRequestScripts')

<script>
    $("#topSearch").on("click",function(){
        $("#top_search_value").val($("#top_search_field").val());
        $('#topfrmSearch').attr('action', '/char/search/'+$("#top_search_field").val());
        $("#topfrmSearch").submit();
    });
</script>
<script>
    $(document).on('click', '#discountBtn', function (e) {
        e.preventDefault();

        var formData = {
            'discountCode': $('#discountCode').val() ,
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "/cart/discount",
                type: "POST",
                data:formData,// get the route value// our serialized array data for server side
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click

                },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    if(response.status==200){
                        alert(response.message)
                        $('#cart_totally').html('');
                        $('#cart_totally').html(response.cartTotally);
                        $('#all_cart_totally').html('');
                        $('#all_cart_totally').html(response.cartTotally);
                    }
                    else{
                        alert(response.message)
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // You can put something here if there is an error from submitted request
                }
            });

    });
</script>
</html>
