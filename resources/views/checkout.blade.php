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

        @include('frontEnd.checkout.checkout')

<!-- FOOTER -->
@include('frontEnd.components.footer')
<!-- /FOOTER -->






<!-- cart  icon  -->
<a href="#" class="back-to-top" data-bs-toggle="modal" data-bs-target="#myCart">
    <i class="fas fa-shopping-cart text-secondary  fa-2x" ></i>
    <span
        class="position-absolute bg-danger rounded-circle d-flex align-items-center justify-content-center text-white px-1"
        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
</a>
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
    $(document).ready(function () {
        getCartProducts();
    });

    function getCartProducts()
    {
        $.ajax({
            type: "GET",
            url: 'show',
            beforeSend: function () {
                $('#cart_items').html("");
                $('#all_cart_totally').html("");
                $('#cart_totally').html("");

            },
            success: function (response) {
                let cartItems='';
                $.each(response.cart.cart_items, function (key, cartItem) {
                    cartItems+='<div class="col-md-6 col-4 m-2 col-xl-4 pt-4 py-2 pe-3 ps-3  rounded recomnded-item position-relative bg-soDark">\
                            <div class="position-absolute rounded-pillborder border-secondary  px-2 py-1" onclick="removeCartItem('+cartItem.id+')" style="top: 4px;left: 4px;" >\
                                <i class="fa fa-times text-danger"></i>\
                            </div>\
                            <div class="row align-items-center  ltr  ">';
                    $.each(cartItem.product.images[0].path, function (key, image) {
                        path="{{asset("storage/")}}";
                        cartItems+='<div class="col-6  pb-3 border-5 mt-3 " style="height: 11rem;width: 11rem;">\
                                   <img src="'+path+'/'+image+'" class="img-fluid rounded-circle w-100 mt-1"style="border: 5px solid black;" alt="">\
                                    </div>';
                    });
                    cartItems+='<div class="col-6 brands rtl">\
                        <h6 class="text-white product-name text-end pe-2">'+cartItem.product.product_name+'</h6>\
                          <div class="py-1">\
                            <span class="text-primaryfs-7 fw-bold">  ر.س '+cartItem.price+'</span>\
                            <del class="text-danger fs-8 p-1">٦٩ ر.س</del>\
                        </div>\
         <div class="d-flex justify-content-between flex-lg-wrap px-md py-2">\
                        <div class="d-flex justify-content-end my-2">\
                        <span class="text-white"> اللون :</span>\
                    <i class="checkmark mx-2"style="background:'+cartItem.item_color+';border-radius: 50%;width: 25px;height: 25px;"></i>\
                </div>\
                    <div class="d-flex justify-content-start my-2">\
                        <span class="text-white"> المقاس :</span>\
                        <a class="mx-2 bg-secondary pt-1" style="background:#f1f1f1;border-radius: 50%;width:34px;height:34px;text-align: center"><span class="checkmark ">'+cartItem.item_size+'</span></a>\
                    </div>\
                </div>\
                    <div class="py-1 d-flex">\
                        <span class="text-white">الكمية  :</span>\
                        <div class="input-group quantity  ms-3 me-3" style="width: 100px;">\
                            <div class="input-group-btn">\
                                <button class="btn btn-sm btn-minus rounded-circle bg-secondary px-2 py-1"  onclick="updateCartItem('+cartItem.id+',0,'+cartItem.quantity+')">\
                                    <i class="fa text-white fa-minus"></i>\
                                </button>\
                            </div>\
                            <input type="text" id="quantity"  class="form-control form-control-sm text-center bg-soDark text-white border-0" value="'+cartItem.quantity+'">\
                                <div class="input-group-btn">\
                                    <button class="btn btn-sm btn-plus rounded-circle bg-secondary px-2 py-"  onclick="updateCartItem('+cartItem.id+',1,'+cartItem.quantity+')">\
                                        <i class="fa text-white fa-plus"></i>\
                                    </button>\
                                </div>\
                        </div>\
                    </div>\
                    <div class="py-1">\
                        <span class="text-white">  الاجمالي :</span>\
                        <span class="text-white fs-7 fw-bold"> <span>'+cartItem.totally+'</span>   ر.س</span>\
                    </div>\
                    </div>\
                    </div>\
                </div>';
                });
                $('#cart_totally').html(response.cart.totally+' ر.س ');
                $('#all_cart_totally').html(response.cart.totally+67 +' ر.س ');
                $('#cart_items').html(cartItems);

                setTimeout(function () {
                    applyQuanTity()
                },30);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#cart_items').html("لاتوجد منتجات مضافة حاليا");
            }
        });

    }

    function removeCartItem(itemId)
    {
        if(confirm('Are you sure you want to delete this data?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE", //we are using GET method to get data from server side
                url: '/cart/'+itemId,
                data: {item_id: itemId}, //set data
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
                     },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    alert(response.status)
                  //  getCartProducts();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                }
            });

        }


    }


    function updateCartItem(itemId,operation,quantity)
    {
        if(operation===0){
            --quantity;
        }
        if(operation===1){
            ++quantity;

        }
        var formData = {
            'quantity':quantity,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT", //we are using GET method to get data from server side
            url: '/cart/' +itemId,
            data: formData, //set data
            beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
                //   $('#quantity').disabled()
            },
            success: function (response) {//once the request successfully process to the server side it will return result here
                alert(response.status)
                getCartProducts();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });



    }
</script>
<script>
    function applyQuanTity(){
// Product Quantity
        $('.quantity button').on('click', function () {
            var button = $(this);
            var oldValue = button.parent().parent().find('input').val();
            if (button.hasClass('btn-plus')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            button.parent().parent().find('input').val(newVal);
        });
    }

</script>
</html>
