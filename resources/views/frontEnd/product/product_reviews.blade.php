@yield('product_reviews')
<div class="col-lg-12">
    <nav>
        <div class="nav nav-tabs mb-3">

            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
        </div>
    </nav>
    <div class="tab-content mb-5">

        <div  class="tab-pane active" id="nav-mission " role="tabpanel" aria-labelledby="nav-mission-tab">
            <div  id="show_comments">
            </div>
        </div>
        <div class="tab-pane" id="nav-vision" role="tabpanel">
            <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                amet diam et eos labore. 3</p>
            <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                Clita erat ipsum et lorem et sit</p>
        </div>
    </div>
</div>
<form   >
    <h4 class="mb-5 fw-bold">Leave a Reply</h4>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="border-bottom rounded">
                <input type="text" id="user_name" name="user_name" class="form-control border-0 me-4" placeholder="Yur Name *">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="border-bottom rounded">
                <input type="email" id="user_email" name="user_email" class="form-control border-0" placeholder="Your Email *">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="border-bottom rounded my-4">
                <textarea id="comment_tittle" class="form-control border-0"  name="comment_tittle" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex justify-content-between py-3 mb-5">
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3">Please rate:</p>
                    <div class="d-flex align-items-center" style="font-size: 12px;">
                        <i class="fa fa-star text-muted"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <button id="sent_comment_btn"  class="btn border border-secondary text-dark rounded-pill px-4 py-3"> Post Comment</button>
            </div>
        </div>
    </div>
</form>
