@yield('footer')
<!-- Footer Start -->

<!-- cart  icon  -->

<a href="#" class="back-to-top" onclick="getCartProducts()" >
    <i class="fas fa-shopping-cart text-secondary  fa-2x" ></i>
    <span
        class="position-absolute bg-danger rounded-circle d-flex align-items-center justify-content-center text-white px-1"
        style="top: -5px; left: 15px; height: 20px; min-width: 20px;" id="cart_count_footer">{{$hasCart}}</span>
</a>
<div class="container-fluid bg-primary text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-8">
                    <a href="#">
                        <h1 class="text-white mb-0">ROSS Glasses</h1>
                        <p class="text-secondary mb-0">BEST & Elegnt looking</p>
                    </a>
                </div>

                <div class="col-lg-4">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary  me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item ">
                    <h4 class="text-light mb-3">من نحن</h4>
                    <p class="mb-4">
                        متجر  لمحلات ابراهيم يقدم  افخم واجود واجمل  واروع وافضل  النظارات ذات الماركات العالمية درجة اولى طبق الأصل بجودة عالية واسعار خرافية المركز الرئيسي الرياض   المملكة العربية السعودية
                    </p>
                    <div href="" class="btn border-white py-2 px-4 rounded-pill text-start text-white">Read More</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-end footer-item">
                    <h4 class="text-light mb-3">معلومات المتجر</h4>
                    <a class="btn-link" href="">من نحن</a>
                    <a class="btn-link" href="">تواصل معنا </a>
                    <a class="btn-link" href="">سياسة الخصوصية </a>
                    <a class="btn-link" href="">الشروط والاحكام</a>
                    <a class="btn-link" href="">سياسة  الاسارجاع والاستبدال </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-end footer-item">
                    <h4 class="text-light mb-3">الحساب</h4>
                    <a class="btn-link" href="">حسابي الشخصي </a>
                    <a class="btn-link" href="">معلومات التسوق </a>
                    <a class="btn-link" href="">سلة التسوق </a>
                    <a class="btn-link" href="">قائمة المفضلة</a>
                    <a class="btn-link" href="">طلباتي</a>
                    <a class="btn-link" href="">طلبات عالمية </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">للتواصل</h4>
                    <p>العنوان: المملكة العربية السعودية - الرياض - حي.... -54534</p>
                    <p>الايميل: Example@gmail.com</p>
                    <p>الهاتف: +0123 4567 8910</p>
                    <p>طرق الدفع</p>
                    <img src="{{asset('frontEnd/img/payment.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
