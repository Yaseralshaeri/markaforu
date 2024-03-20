@yield('cartView.blade')
<!-- Start my cart Modal-->
<div class="modal fade" id="myCart" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title">سلتي</h5>
            </div>
            <div class="modal-body">
                <div id="cartMessages" class="toast-notify  mb-2 align-items-center text-white  border-0 d-none" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body d-flex justify-content-between" id="cartMessages-body">
                    </div>
                </div>
                <div class="row" id="cart_items">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-2" data-bs-dismiss="modal">اغلاق</button>
               <a href="/cart/"><button type="button" class="btn bg-secondary text-primary btn-secondary px-3" >شراء الآن</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End my cart Modal-->
@section('cartRequestScripts')

<script>
    $(document).on('click', '#addProductIdToCart', function (e) {
        e.preventDefault();
        let productId=$('#product_id').attr('data_value')
        let quantity=$('#quantity').val()
        let product_price=$('#product_price').attr('data_value')
        let $color= $("[name='product_color']");
        let $size= $("[name='product_size']");
        let $errorMsg=  $('#productMessages');
        let available_quantity=$("#availalbe_aquantity").attr("data_value");
        var $this 		    = $('#addProductIdToCartBtn'); //submit button selector using ID
        var $caption        = $this.html();// We store the html content of the submit button
        let color_id='',size_id='',msg='';
        if ( $color.is(':checked')) {
            color_id = $('input[name="product_color"]:checked').attr("data_value");
        }
        if ( $size.is(':checked')) {
            size_id = $('input[name="product_size"]:checked').attr("data_value");
        }
        var formData = {
            'product_id':productId ,
            'quantity':quantity ,
            'price':product_price ,
            'item_size':size_id,
            'item_color':color_id
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (!$size.is(':checked') || !$color.is(':checked') || quantity==0 || quantity>available_quantity) {
            if(quantity==0){
                msg=' فضلا قم  بتحديد كمية صالحة  <i class="fas fa-exclamation-triangle ms-3 text-white"></i>';
            }
            else if(quantity>available_quantity){
                msg=' هذه الكمية غير متاحة يتوفر لدينا  '+available_quantity+' فقط <i class="fas fa-exclamation-triangle ms-3 text-white"></i>';
            }
            else {
                msg=' فضلا قم باختيار اللون والمقاس المطلوب  <i class="fas fa-exclamation-triangle ms-3 text-white"></i>';
            }
            $errorMsg.removeClass('d-none');
            $errorMsg.addClass('bg-warning');
            $('#toast-body').html(msg);
            setTimeout(() => {
                $errorMsg.addClass('d-none');
                $errorMsg.removeClass('bg-warning');

            },5000);
        }
        else{
            $.ajax({
                url: "/cart/store",
                type: "POST",
                data:formData,// get the route value// our serialized array data for server side
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
                    let spiner='جاري الاضافة <div class="spinner-border text-primary me-2" role="status"><span class="visually-hidden">Loading...</span></div> ';
                   $this.attr('disabled', true).html(spiner);
                },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    $this.attr('disabled', false).html($caption);
                    if(response.status==200){
                        msg=response.message+'<i class="fas fa-info-circle ms-3 text-white"></i>';
                        $errorMsg.removeClass('d-none');
                        $errorMsg.addClass('bg-success');
                        getCartItemsCount(response.cartCount);
                        $('#toast-body').html(msg);
                        setTimeout(() => {
                            $errorMsg.addClass('d-none');
                            $errorMsg.removeClass('bg-success');
                        },5000);
                    }
                    else{
                        msg=response.message+'<i class="fas fa-fill ms-3 text-white"></i>';
                        $errorMsg.removeClass('d-none');
                        $errorMsg.addClass('bg-danger');
                        $('#toast-body').html(msg);
                        setTimeout(() => {
                            $errorMsg.addClass('d-none');
                            $errorMsg.removeClass('bg-danger');

                        },5000);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // You can put something here if there is an error from submitted request
                }
            });

        }


    });
    function getCartProducts()
    {
        $.ajax({
            type: "GET",
            url: '/cart/show',
            beforeSend: function () {
                $('#cart_items').html("");


            },
            success: function (response) {
                let cartItems='';
                $.each(response.cart.cart_items, function (key, cartItem) {
                    cartItems+='<div class="col-12 my-2  " id="item-'+cartItem.id+'">\
                        <div class="py-2 pe-3 ps-3  rounded recomnded-item position-relative bg-soDark">\
                            <div class="position-absolute rounded-pill border border-secondary  px-2 py-1" onclick="removeCartItem('+cartItem.id+')" style="top: 4px;left: 4px;" >\
                                <i class="fa fa-times text-danger"></i>\
                            </div>\
                            <div class="row align-items-center  ltr  ">';
                    $.each(cartItem.product.images[0].path, function (key, image) {
                        cartItems+='<div class="col-6  pb-3 border- mt-3 " style="height: 11rem;width:11rem;">\
                                     <img src="/storage/'+image+'" class="img-fluid rounded-circle  mt-1"style="border: 5px solid black;" alt="">\
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
                                <button class="btn btn-sm btn-minus rounded-circle bg-secondary px-2 py-1"  onclick="updateCartItem('+cartItem.id+',0)">\
                                    <i class="fa text-white fa-minus"></i>\
                                </button>\
                            </div>\
                            <input type="text" id="item'+cartItem.id+'Quantity"  class="form-control form-control-sm text-center bg-soDark text-white border-0"  value="'+cartItem.quantity+'">\
                                <div class="input-group-btn">\
                                    <button class="btn btn-sm btn-plus rounded-circle bg-secondary px-2 py-"  onclick="updateCartItem('+cartItem.id+',1)">\
                                        <i class="fa text-white fa-plus"></i>\
                                    </button>\
                                </div>\
                        </div>\
                    </div>\
                    <div class="py-1">\
                        <span class="text-white">  الاجمالي :</span>\
                        <span class="text-white fs-7 fw-bold"> <span id="cartItem-'+cartItem.id+'-totally">'+cartItem.totally+'</span>   ر.س</span>\
                    </div>\
                    </div>\
                    </div>\
                    </div>\
                </div>';
                });
                setTimeout(function () {
                    applySlick()
                },100);
                $('#cart_items').html(cartItems);
                $('#myCart').modal('show');

            }

        });
        setTimeout(function () {
            applySlick()
        },0);
    }

    function removeCartItem(itemId)
    {
        if(confirm('Are you sure you want to delete this data?')) {
            let $cartMessage=$('#cartMessages');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE", //we are using GET method to get data from server side
                url: '/cart/' + itemId,
                data: {item_id: itemId}, //set data
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
                },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    let msg='';
                    if(response.status==200){
                        msg=response.message+'<i class="fas fa-info-circle ms-3 text-white"></i>';
                        $cartMessage.removeClass('d-none');
                        $cartMessage.addClass('bg-success');
                        getCartItemsCount(response.cartCount);
                        $('#item-'+itemId).addClass('d-none');
                        $('#cartMessages-body').html(msg);
                        setTimeout(() => {
                            $cartMessage.addClass('d-none');
                            $cartMessage.removeClass('bg-success');
                        },5000);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });

        }


    }


    function updateCartItem(itemId,operation)
    {
        let quantity=  $('#item'+itemId+'Quantity').val();

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
            url: '/cart/' + itemId,
            data: formData, //set data
            beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
            },
            success: function (response) {//once the request successfully process to the server side it will return result here
                if(response.status==200){
                    $('#cartItem-'+itemId+'-totally').html('');
                    $('#cartItem-'+itemId+'-totally').html(response.cartItemTotally);
                    $('#cart_totally').html('');
                    $('#cart_totally').html(response.cartTotally);
                    $('#all_cart_totally').html('');
                    $('#all_cart_totally').html(response.cartTotally);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    }
    function getCartItemsCount(cartCount)
    {   $('#cart_count_footer').html("");
        $('#cart_count_header').html("");
        $('#cart_count_header').html(cartCount);
        $('#cart_count_footer').html(cartCount);
    }
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
@endsection


