@yield('checkout')
<!-- Checkout Page Start -->
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="/address/store" method="POST" >
            @csrf
                <div class="cart-totally rounded px-3 py-5 rtl">
                   {{-- <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">الاسم الاول<sup>*</sup></label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">اللقب <sup>*</sup></label>
                                <input type="text" name="last_name"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">رقم الهاتف<sup>*</sup></label>
                        <input type="tel" name="phone_number"  class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">البريد الالكتروني <sup>*</sup></label>
                        <input type="email" name="email"  class="form-control">
                    </div>--}}
                    <div class="form-item">
                        <label class="form-label my-3">الدولة<sup>*</sup></label>
                        <input type="text" name="country"  class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">المحافظة<sup>*</sup></label>
                        <input type="text" name="city"  class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">المدينة<sup>*</sup></label>
                        <input type="text" name="state"  class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">العنوان <sup>*</sup></label>
                        <input type="text" name="street"  class="form-control" placeholder="الشارع او رقم المنزل">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                        <input type="text" name="zip_code"  class="form-control">
                    </div>
                    <hr>
                    <div class="form-item">
                        <textarea name="text"   class="form-control" spellcheck="false" cols="30" rows="11" placeholder="معلومات اكثر (اختياري)"></textarea>
                    </div>
                </div>
        </form>
        <div class="d-flex justify-content-between mt-5 py-4">
            <button style="width: 40%"  type="submit" class="btn border-dark prev-step py-2 px-5  text-uppercase  next-step text-dark">السابق</button>
            <button   style="width: 40%"  type="submit" class="btn border-secondary  py-2 px-5 text-uppercase  next-step text-secondary">التالي</button>
        </div>
    </div>
<!-- Checkout Page End -->
