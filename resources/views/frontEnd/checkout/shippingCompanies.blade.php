@yield('shippingCompanies')
<!-- Checkout Page Start -->
<div class="container py-5">
    <h1 class="mb-4">شركة الشحن </h1>
        <div  style="padding-left: 0.5px;padding-right: 0.5px">
                 <div class="cart-totally rounded my-4 px-md-5">
                     <fieldset class="row mb-3 p-5">
                         <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                         <div class="col-sm-10 ">
                             <div class="form-check p-1">
                                 <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                 <label class="form-check-label  " for="gridRadios1">
                                     First radio
                                 </label>
                                 <span class="form-check-label text-danger font-sans px-3" for="gridRadios1">
                                     20 ر.س
                                 </span>
                             </div>
                             <div class="form-check p-1" >
                                 <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                 <label class="form-check-label" for="gridRadios2">
                                     Second radio
                                 </label>
                             </div>
                             <div class="form-check p-1">
                                 <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                                 <label class="form-check-label" for="gridRadios3">
                                     Third  radio
                                 </label>
                             </div>
                         </div>
                     </fieldset>
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
