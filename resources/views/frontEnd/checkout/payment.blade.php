@yield('shippingCompanies')
<!-- Checkout Page Start -->
<div class="container py-5">
    <h1 class="mb-4"> الدفع</h1>
        <div  style="padding-left: 0.5px;padding-right: 0.5px">
            <div class="bg-light py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <h4>Payment Info</h4>
                            <div class=" shadow-sm bg-white p-4 my-4">
                                <h6 class="mb-4">Your Saved Cards</h6>
                                <div class="row g-4">
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="shadow cardStyle py-4 px-2 mt-2  bg-secondary" style="   ">
                                            <input type="radio" checked class="selectBox selected m-2" name="pay-methode" >
                                            <img src="{{asset('frontEnd/img/pay-option-credit-2.svg')}}">
                                        </div>
                                        </img>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="shadow cardStyle py-1 px-2 mt-2  " style="   ">
                                            <input type="radio"  class="selectBox selected m-2" name="pay-methode" >
                                            <img src="{{asset('frontEnd/img/visa-1.svg')}} " width="140px" height="80px">
                                        </div>
                                        </img>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="shadow cardStyle py-1 px-2 mt-2  "style="   ">
                                            <input type="radio"  class="selectBox selected m-2" name="pay-methode">
                                            <img src="{{asset('frontEnd/img/tabby.png')}}" width="140px" height="85px">
                                        </div>
                                        </img>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="shadow cardStyle py-4 px-2 mt-2  " style="   ">
                                            <input type="radio"  class="selectBox selected m-2" name="pay-methode">
                                            <img src="{{asset('frontEnd/img/pay-option-credit-2.svg')}}">
                                        </div>
                                        </img>
                                    </div>

                                </div>


                                <form action="">
                                    <div class="col-sm-6 mt-5">
                                        <label for="cardName">Name on the card</label>
                                        <input type="text" id="cardName" class="form-control my-1">
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <label for="cardNumber">Card Number</label>
                                        <input type="text" id="cardNumber" class="form-control my-1">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-6 mt-4">
                                            <label for="expiry">Card Expiry (mm/yy)</label>
                                            <input type="text" id="expiry" class="form-control my-1">
                                        </div>
                                        <div class="col-sm-3 col-xs-6 mt-4">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" class="form-control my-1">
                                        </div>
                                    </div>

                                    <div class="mt-5 mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <a href="javascript:goBack()" class="btn btn-outline-secondary w-100">Go Back</a>
                                            </div>
                                            <div class="col">
                                                <button role="button" type="submit" class="btn btn-primary w-100">Charge</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--
            <div class="cart-totally rounded py-5 ltr  px-3 bg-secondary d-flex ">

--}}
{{--
                <div class="container1-0">
                    <div class="card__container">
                        <div class="cards-card">
                            <div class="cards-row paypal">
                                <div class="left">
                                    <input id="pp" checked type="radio" name="payment" />
                                    <div class="radio"></div>
                                    <label for="pp">Paypal</label>
                                </div>
                                <div class="right">
                                    <i class="fa fa-2x text-white fa-cc-paypal" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="cards-row credit">
                                <div class="left">
                                    <input id="cd" type="radio" name="payment" />
                                    <div class="radio"></div>
                                    <label for="cd">Debit/ Credit Card</label>
                                </div>
                                <div class="right">
                                    <i class="fa fa-2x text-secondary fa-cc-visa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="cards-row credit">
                                <div class="left">
                                    <input id="cd" type="radio" name="payment" />
                                    <div class="radio"></div>
                                    <label for="cd">Debit/ Credit Card</label>
                                </div>
                                <div class="right">
                                    <i class="fa fa-2x text-secondary fa-cc-visa" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="cards-row credit">
                                <div class="left">
                                    <input id="cd" type="radio" name="payment" />
                                    <div class="radio"></div>
                                    <label for="cd">Debit/ Credit Card</label>
                                </div>
                                <div class="right">
                                    <i class="fa fa-2x text-secondary fa-cc-visa" aria-hidden="true"></i>
                                </div>
                            </div>

                            <span id="cards-inputs">
                               <div class="cards-row cardholder">
                                   <div class="info">
                                       <label for="cardholdername">Name</label>
                                       <input placeholder="e.g. Richard Bovell" id="cardholdername" type="text" />
                                   </div>
                               </div>
                               <div class="cards-row number">
                                   <div class="info">
                                       <label for="cardnumber">Card number</label>
                                       <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19" placeholder="8888-8888-8888-8888"/>
                                   </div>
                               </div>
                               <div class="cards-row details">
                                   <div class="left">
                                       <label for="expiry-date">Expiry</label>
                                       <select id="expiry-date">
                                           <option>MM</option>
                                           <option value="1">01</option>
                                           <option value="2">02</option>
                                           <option value="3">03</option>
                                           <option value="4">04</option>
                                           <option value="5">05</option>
                                           <option value="6">06</option>
                                           <option value="7">07</option>
                                           <option value="8">08</option>
                                           <option value="9">10</option>
                                           <option value="11">11</option>
                                           <option value="12">12</option>
                                       </select>
                                       <span>/</span>
                                       <select id="expiry-date">
                                           <option>YYYY</option>
                                           <option value="2016">2016</option>
                                           <option value="2017">2017</option>
                                           <option value="2018">2018</option>
                                           <option value="2019">2019</option>
                                           <option value="2020">2020</option>
                                           <option value="2021">2021</option>
                                           <option value="2022">2022</option>
                                           <option value="2023">2023</option>
                                           <option value="2024">2024</option>
                                           <option value="2025">2025</option>
                                           <option value="2026">2026</option>
                                           <option value="2027">2027</option>
                                           <option value="2028">2028</option>
                                           <option value="2029">2029</option>
                                           <option value="2030">2030</option>
                                       </select>
                                   </div>
                                   <div class="right">
                                       <label for="cvv">CVC/CVV</label>
                                       <input type="text" maxlength="4" placeholder="123"/>
                                       <span data-balloon-length="medium" data-balloon="The 3 or 4-digit number on the back of your card." data-balloon-pos="up">i</span>
                                   </div>
                               </div>
                         </span>
                        </div>
                    </div>
                    <div class="button mt-3">
                        <button type="submit"><i class="ion-locked"></i> Confirm and Pay</button>
                    </div>
                </div>
--}}{{--


            </div>
--}}
        </div>
</div>
<!-- Checkout Page End -->
