
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


<!-- Single Product Start -->

<div class="container"></div>,
<div class="container-fluid  py-5  ">
{{--
<div class="container">
    <div class="wizard-progress">
        <div class="step complete">
            Sourcing
            <div class="node"></div>
        </div>
        <div class="step complete">
            Grading
            <div class="node"></div>
        </div>
        <div class="step in-progress">
            Treatment
            <div class="node"></div>
        </div>
        <div class="step">
            Attributes
            <div class="node"></div>
        </div>
        <div class="step">
            Summary
            <div class="node"></div>
        </div>
    </div>

</div>
--}}
    <div class="container">
        <div class="progress px-1" style="height: 3px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="step-container d-flex justify-content-between">
            <div class="step-circle" onclick="displayStep(1)">1</div>
            <div class="step-circle" onclick="displayStep(2)">2</div>
            <div class="step-circle" onclick="displayStep(3)">3</div>
            <div class="step-circle" onclick="displayStep(4)">4</div>
        </div>
    </div>
    <div id="multi-step-form">
        <div class="row step step-1" >
            @include('frontEnd.checkout.cartSummary')
        </div>
        <div class=" step step-2">
            @include('frontEnd.checkout.checkout')
        </div>
        <div class=" step step-3 " >
            @include('frontEnd.checkout.shippingCompanies')
            <div class="container col-md-12 d-flex justify-content-between">
                <button   type="submit" class="btn border-dark prev-step py-2 px-4 text-uppercase  next-step text-dark">السابق</button>
                <button   type="submit" class="btn border-success py-2 px-4 text-uppercase w- next-step text-success">  اتمام عملية الطلب والدفع </button>
            </div>
        </div>
        <div class=" step step-4 " >
            @include('frontEnd.checkout.payment')
            <div class="container col-md-12 d-flex justify-content-between">
                <button   type="submit" class="btn border-dark prev-step py-2 px-4 text-uppercase  next-step text-dark">السابق</button>
                <button   type="submit" class="btn border-success py-2 px-4 text-uppercase w- next-step text-success">  اتمام عملية الطلب والدفع </button>
            </div>
        </div>
    </div>

</div>

<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->





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

<script>var currentStep = 1;
    var updateProgressBar;

    function displayStep(stepNumber) {
        if (stepNumber >= 1 && stepNumber <= 4) {
            $(".step-" + currentStep).hide();
            $(".step-" + stepNumber).show();
            currentStep = stepNumber;
            updateProgressBar();
        }
    }

    $(document).ready(function() {
        $('#multi-step-form').find('.step').slice(1).hide();

        $(".next-step").click(function() {
            if (currentStep ==1) {
                $('#cart_totally_box').addClass('d-none');
            }
            else{
                $('#cart_totally_box').removeClass('d-none');

            }
            if (currentStep < 4) {
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
                    $('#all_cart_totally').html('');
                    $('#all_cart_totally').html(response.cartTotally);
                    $('#all_cart_totally-2').html('');
                    $('#all_cart_totally-2').html(response.cartTotally);
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


    function setShippingCompany(shippingCompanyId){

            var formData = {
                'shipping_company_id':shippingCompanyId ,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/cart/shipping",
                type: "POST",
                data:formData,// get the route value// our serialized array data for server side
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click

                },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    if(response.status==200){
                        $('#all_cart_totally').html('');
                        $('#all_cart_totally').html(response.cartTotally);
                        $('#all_cart_totally-2').html('');
                        $('#all_cart_totally-2').html(response.cartTotally);
                    }
                    else{
                        alert(response.message)
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // You can put something here if there is an error from submitted request
                }
            });
    }



</script>


</html>
