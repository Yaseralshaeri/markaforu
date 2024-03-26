
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
