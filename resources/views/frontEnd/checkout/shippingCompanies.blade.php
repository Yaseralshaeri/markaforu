@yield('shippingCompanies')
<!-- Checkout Page Start -->
<div class="container py-5">
    <h1 class="mb-4">شركة الشحن </h1>
        <div  style="padding-left: 0.5px;padding-right: 0.5px">
            <div class="cart-totally rounded py-5 ltr ">
                <section>
                    <div>
                        <input class="input-shipping" type="radio" id="control_01" name="select" value="1" checked>
                        <label for="control_01">
                            <h2>Pfft</h2>
                            <p>Awww, poor baby. Too afraid of the scary game sprites? I laugh at you.</p>
                        </label>
                    </div>
                    <div>
                        <input class="input-shipping" type="radio" id="control_02" name="select" value="2">
                        <label for="control_02">
                            <h2>Wannabe</h2>
                            <p>You're not a gaming God by any stretch of the imagination.</p>
                        </label>
                    </div>
                    <div>
                        <input class="input-shipping" type="radio" id="control_03" name="select" value="3">
                        <label for="control_03">
                            <h2>Daaamn</h2>
                            <p>Now we're talking. It's gettin' a bit hairy out there in game land.</p>
                        </label>
                    </div>
                    <div>
                        <input class="input-shipping" type="radio" id="control_05" name="select" value="5">
                        <label for="control_05">
                            <h2>Suicidal</h2>
                            <p>You will not live. Strap in and write a heart-felt letter to your loved ones.</p>
                        </label>
                    </div>
                </section>
            </div>

            <div class="cart-totally rounded my-4 px-md-5">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">السلة <span class="fw-normal">اجمالي</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 ms-4">مبلغ الطلب:</h5>
                                <p class="mb-0"><span  id="cart_totally">99</span>ر.س </p>
                            </div>
                        </div>
                        <div class="py-2  px-3  border-top border-bottom ">
                            <span>لديك كود خصم ؟</span>
                            <div class="input-group my-2 ltr ">
                                <button class="btn btn-outline-secondary px-3" type="button" id="discountBtn">خصم</button>
                                <input type="text" class="form-control"  aria-label="Example text with button addon" id="discountCode" placeholder="كود الخصم" aria-describedby="button-addon1">
                            </div>
                            <span class="text-success text-left"> مبلغ الخصم ؟ </span>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">اجمالي</h5>
                            <p class="mb-0  ps-4" ><span  id="all_cart_totally">99</span>ر.س  </p>
                        </div>
                        <div class="p-3 text-center ">
                                <button   type="button"  class="btn border-secondary bg-primary next-step py-2-5 px-3 text-uppercase w-100 next-step text-secondary">متابعة عملية الشراء</button>
                        </div>
                    </div>

        </div>
</div>
<!-- Checkout Page End -->
