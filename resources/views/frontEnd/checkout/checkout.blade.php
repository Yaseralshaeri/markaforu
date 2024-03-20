@yield('checkout')
<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5 ltr">
        <h1 class="mb-4">Billing details</h1>
        <form action="/address/store" method="POST" >
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7 rtl">
                    <div class="row">
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
                    </div>
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
                <div class="col-md-12 col-lg-6 col-xl-5 rtl">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($getCart as $cart)
                                @foreach ($cart->cartItems as  $cartItem)
                            <tr>
                                @foreach ($cartItem->product->images as $product_images)
                                    @foreach ($product_images->path as $img)
                                        @if ($loop->first)
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset("storage/$img")}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                        @endif
                                    @endforeach
                                @endforeach
                                <td class="py-5">{{$cartItem->product->product_name}}</td>
                                <td class="py-5">{{$cartItem->price}}</td>
                                <td class="py-5">{{$cartItem->quantity}}</td>
                                <td class="py-5">{{$cartItem->totally}}</td>
                            </tr>
                                @endforeach
                            @empty
                                <p>لاتوجد منتجات مضافة حاليا</p>
                            @endforelse

                            <tr class="mt-5">
                                <th scope="row">
                                </th>
                                <td class="py-1">
                                    <p class="mb-0 text-dark py-3"> إجمالي المبلغ</p>
                                </td>
                                @forelse ($getCart as $cart)
                                    <td class="py-1">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">{{$cart->totally}}</p>
                                        </div>
                                    </td>
                                @empty
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark"></p>
                                        </div>
                                    </td>
                                @endforelse
                                <td class="py-1">
                                </td>
                                <td class="py-1">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-4">Shipping</p>
                                </td>
                                <td colspan="3" class="py-5">
                                    <div class="form-check text-start">
                                        <input type="checkbox" class="form-check-input bg-secondary border-0" id="Shipping-1" name="Shipping-1" value="Shipping">
                                        <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                    </div>
                                    <div class="form-check text-start">
                                        <input type="checkbox" class="form-check-input bg-secondary border-0" id="Shipping-2" name="Shipping-1" value="Shipping">
                                        <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                                    </div>
                                    <div class="form-check text-start">
                                        <input type="checkbox" class="form-check-input bg-secondary border-0" id="Shipping-3" name="Shipping-1" value="Shipping">
                                        <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-3">
                                    <p class="mb-0 text-dark py-3"> الخصم</p>
                                </td>
                                @forelse ($getCart as $cart)
                                <td class="py-3">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark">{{$cart->totally}}</p>
                                    </div>
                                </td>
                                @empty
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark"></p>
                                        </div>
                                    </td>
                                @endforelse
                                <td class="py-3">
                                </td>
                                <td class="py-3">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-3">إجمالي العام</p>
                                </td>
                                @forelse ($getCart as $cart)
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">{{$cart->totally}}</p>
                                        </div>
                                    </td>
                                @empty
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark"></p>
                                        </div>
                                    </td>
                                @endforelse
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button  type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-secondary"> اتمام عملية الطلب والدفع</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
