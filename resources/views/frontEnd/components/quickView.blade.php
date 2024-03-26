<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-30 ltr">
    <div class="overlay-modal1 js-hide-modal1"></div>
    <div class="container ">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src=""{{asset('frontEnd/img/icon-close.png')}}" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg "id="product-images">

                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30 px-5 rtl">
                    <div id="productMessages" class="toast-notify mb-2 align-items-center text-white  border-0 d-none" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-body d-flex justify-content-between" id="toast-body">
                            </div>
                    </div>
                    <div class="product-details py-">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal1 -->
@section('quickViewRequestScripts')
    <script>
        function getProductQuickView(productId)
        {
            $.ajax({
                type: "GET",
                url: '/getProductQuickView/'+productId,
                beforeSend: function () {
                    $('#product-images').html("");
                },
                success: function (response) {
                    $('.product-details').html("");
                    let product_imgs='',product_details='',product_colors='',product_size='';
                    product_imgs +=' <div class="wrap-slick3 flex-sb flex-w">';
                    product_imgs +=' <div class="wrap-slick3-dots"></div>';
                    product_imgs +=' <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>';
                    product_imgs +='  <div class="slick3 gallery-lb" >';
                    $.each(response.product[0].images, function (key, images) {
                        $.each(images.path, function (key, item) {
                            product_imgs +="<div class='item-slick3' data-thumb='storage/"+item+"'>";
                            product_imgs +='<div class="wrap-pic-w pos-relative product-main-image">';
                            product_imgs +='<img src="/storage/'+item+'"alt="IMG-PRODUCT">';
                            product_imgs += '</div>';
                            product_imgs +='<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"  href="storage/'+item+'">';
                            product_imgs +='<i class="fa fa-expand"></i>';
                            product_imgs += '</a>';
                            product_imgs +='</div>';
                        });
                        product_colors+='<li><input type="radio" name="product_color" data_value="'+images.color.color_hex+'"><span class="checkmark"style="background:'+images.color.color_hex+'"></span></li>';

                    });
                    $.each(response.product[0].sizes, function (key, item) {

                        product_size+='<li class="m-1"><input type="radio"  class="p-4" name="product_size" data_value="'+item.size+'"><span class="checkmark text-center pt-1"  style="width: 40px;height: 40px;background-color: #f1f1f1;color: #999999">'+item.size+'</span></li>';

                    });
                    product_imgs +=' </div>';
                    product_imgs +='</div>';
                    product_details='<h2 class="product-name" id="product_id" data_value="'+response.product[0].id+'">'+response.product[0].product_name+'</h2>\
                     <div>\
                        <a class="review-link" href="#">  10 مراجعات لهذا المنتج | اضف مراجعتك </a>\
                        <div class="product-rating">\
                            <i class="fa fa-star text-dark"></i>\
                            <i class="fa fa-star text-dark"></i>\
                            <i class="fa fa-star text-dark"></i>\
                            <i class="fa fa-star text-dark"></i>\
                            <i class="fa fa-star-o"></i>\
                        </div>\
                    </div>\
                    <div>\
                        <h3 id="product_price" data_value="'+response.product[0].new_price+'" class="product-price" >'+response.product[0].new_price+'<del class="product-old-price">'+response.product[0].old_price+'</del>\
                        </h3>\
                    </div>\
                    <div class="product_availalbe">\
                        <ul class="d-flex">\
                            <li>المخزون  <span class="stock">المتاح :</span></li>\
                            <li id="available_quantity" data_value="'+response.product[0].quantity+'"><i class="icon-layers icons"></i> يتبقى  <span>'+response.product[0].quantity+'</span> فقط </li>\
                        </ul>\
                    </div>\
                    <p>'+response.product[0].description+'</p>\
                    <div class="product_variant">\
                        <div class="filter__list widget_color d-flex align-items-center">\
                          <h3>اختيار اللون </h3>\
                            <ul class="mt-2">'+product_colors+'</ul>\
                        </div>\
                        <div class="filter__list widget_color d-flex align-items-center">\
                            <h3>اختيار المقاس </h3>\
                            <ul class="mt-2">'+product_size+'</ul>\
                        </div>\
                    </div>\
                    <div class="d-flex ">\
                        <span>الكمية</span>\
                        <div class="input-group quantity mb-5 ms- " style="width: 100px;">\
                            <div class="input-group-btn">\
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">\
                                    <i class="fa fa-minus"></i>\
                                </button>\
                            </div>\
                            <input type="text" class="form-control form-control-sm text-center border-0" id="quantity" value="1">\
                                <div class="input-group-btn">\
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">\
                                        <i class="fa fa-plus"></i>\
                                    </button>\
                                </div>\
                        </div>\
                        <div class="me-5 buttons align-items-center mt-n1" id="addProductIdToCart"  >\
                            <button class="btn btn-outline-dark" id="addProductIdToCartBtn">\
                          <i class="fa fa-shopping-bag ms-2 text-dark"></i>اضافة الى السلة\
                    </button>\
                        </div>\
                    </div>\
                    <ul class="product-btns">\
                        <li><a class="text-dark" href="#"><i class="fa fa-heart-o text-secondary"></i>\
                            اضافةالى المفضلة </a></li>\
                        <li><a class="text-dark" href="#"><i class="fa fa-exchange text-secondary"></i>\
                            عرض اكثر</a></li>\
                    \</ul>';

                    setTimeout(function () {
                        applySlick()
                        zoomImages()
                    },100);
                    $('#product-images').html(product_imgs);
                    $('.product-details').html(product_details);

                    $('.js-modal1').addClass('show-modal1');
                }
            });

        }
    </script>
    <script>
        function applySlick(){

            $('.wrap-slick3').each(function(){
                $(this).find('.slick3').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    infinite: true,
                    autoplay: false,
                    autoplaySpeed: 6000,
                    arrows: true,
                    appendArrows: $(this).find('.wrap-slick3-arrows'),
                    prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                    nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                    dots: true,
                    appendDots: $(this).find('.wrap-slick3-dots'),
                    dotsClass:'slick3-dots',
                    customPaging: function(slick, index) {
                        var portrait = $(slick.$slides[index]).data('thumb');
                        return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                    },
                });
            });
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

@endsection




