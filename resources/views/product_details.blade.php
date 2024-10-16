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
    <link href="{{asset('frontEnd/css/single-product.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/si.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">
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
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        @include('frontEnd.product.product_details')

        <div class="row g-4 my-5">
            <div class="col-lg-12 col-xl-12 mt-4">
                @include('frontEnd.product.related_products')
                @include('frontEnd.product.product_reviews')
            </div>
        {{--    <div class="col-lg-4 col-xl-3 mt-4">
                <div class="row g-4 fruite">
                    @include('frontEnd.product.categories')
                    @include('frontEnd.shop.shopAd')
                    @include('frontEnd.shop.shopFeaturesProducts')

                </div>
            </div>--}}
        </div>

    </div>
</div>
<!-- Single Product End -->









<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->
<!-- Modal -->
<!-- Modal end -->


<!-- Modal -->
@include('frontEnd.components.cartView')
<!-- Modal end -->

<!-- Modal -->
@include('frontEnd.components.quickView')
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
<script src="{{asset('frontEnd/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontEnd/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}">

</script>
<script>
    function getComments(){
        $.ajax({
            type: "GET",
            url: '/product/showComment/',
            data:{'product_id':$('#product_id').attr("data_value")},
            beforeSend: function () {
                $('#show_comments').html("");
            },
            success: function (response) {
                let comments='';
                $.each(response.comments, function (key, comment) {
                comments+='<div class="d-flex">\
                <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">\
                <div class="">\
                    <p class="mb-2" style="font-size: 14px;">'+comment.created_at+'</p>\
                    <div class="d-flex justify-content-between">\
                        <h5>'+comment.customer.email+'</h5>\
                        <div class="d-flex mb-3">\
                            <i class="fa fa-star text-secondary"></i>\
                            <i class="fa fa-staxt-secondary"></i>\
                            <i class="fa fa-star texr text-secondary"></i>\
                            <i class="fa fa-star tet-secondary"></i>\
                            <i class="fa fa-star"></i>\
                        </div>\
                    </div>\
                    <p> '+comment.comment_tittle+' </p>\
               </div>\
               </div>';
               $('#show_comments').html(comments);
                });
            }
        });   
       
    }
    $(document).ready(function() {

        getComments()

        $('#sent_comment_btn').on("click",function(event) {
            event.preventDefault();
            alert('!');
           var formData = {
            'user_name':'i',
            'user_email': $('#user_email').val(),
            'comment_tittle': $('#comment_tittle').val(),
             'product_id':$('#product_id').attr("data_value")
           };
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/product/setComment', // افتراضيا، سيكون هذا هو المسار إلى روت Laravel الخاص بالتحميل
                type: 'POST',
                data: formData,
                success: function(response) {
                if(response.status==200)
                    alert(response.message);
                     getComments();
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   alert('respxxxxxxxxxxxx')

                }
            });
        });
    });
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
    $("#topSearch").on("click",function(){
        $("#top_search_value").val($("#top_search_field").val());
        $('#topfrmSearch').attr('action', '/char/search/'+$("#top_search_field").val());
        $("#topfrmSearch").submit();
    });
</script>
@yield('cartRequestScripts')
</html>
