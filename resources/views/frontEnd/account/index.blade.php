@extends('frontEnd.layouts.layout')
@section('stylesheet')
    <style>
        .ad-list-item{
            opacity: 1;
            transition: .3s;
        }
        .ad-list-item.fade{
            opacity: 0;
        }
        .ad-list-item.none{
            display: none!important;
        }

    </style>
@endsection

@section('content')
    <section class="account-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-start">
                        <h3>My Account</h3>
                        <div class="account-details">
                            <img src="{{ asset('assets/frontEnd/images/user.png') }}" class="img-fluid" alt="">
                            <div class="account-info">
                                <h4>User Name</h4>
                                <a href="#"> <i class="bi bi-envelope"></i> sample@gmail.com</a>
                                <a href="#"> <i class="bi bi-telephone"></i> +234 364 937 203</a>
                            </div>
                        </div>

                    </div>
                    <div class="account-end">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="my-ads-tab" data-bs-toggle="tab" data-bs-target="#my-ads-tab-pane" type="button" role="tab" aria-controls="my-ads-tab-pane" aria-selected="true">My Ads</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="my-ratings-tab" data-bs-toggle="tab" data-bs-target="#my-ratings-tab-pane" type="button" role="tab" aria-controls="my-ratings-tab-pane" aria-selected="false">My Ratings</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="my-ads-tab-pane" role="tabpanel" aria-labelledby="my-ads-tab" tabindex="0">

                                <nav class="ad-filter filters-button-group">
                                    <button class="btn btn-filter is-checked" data-filter="*">All Ads <span>(3)</span></button>
                                    <button class="btn btn-filter" data-filter="live">Live <span>(1)</span></button>
                                    <button class="btn btn-filter" data-filter="under-review">Under Review <span>(0)</span></button>
                                    <button class="btn btn-filter" data-filter="sold">Sold <span>(2)</span></button>
                                    <button class="btn btn-filter" data-filter="expired">Expired <span>(2)</span></button>
                                </nav>
                                <div class="ad-filter-select">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Select All
                                        </label>
                                    </div>
                                    <a href="#" class="btn btn-outline ms-auto">Delete All</a>
                                </div>
                                <div class="ad-filter-content">
                                    <div class="ad-filter-warpper">
                                        <div class="ad-list-item  live">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                            </div>
                                            <img src="{{ asset('assets/frontEnd/images/ad-sm.png') }}" class="img-fluid" alt="">
                                            <div class="ad-list-info">
                                                <h5>Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
                                                <p>Experience the pinnacle of smartphone innovation with the Apple iPhone 12. Boasting a sleek design and powerful performance, this cutting-edge device redefines what a smartphone can do.</p>
                                                <span><i class="bi bi-geo-alt"></i> Location, location</span>
                                            </div>
                                            <a href="#" class="btn btn-outline ms-auto">Delete</a>
                                        </div>
                                        <div class="ad-list-item  under-review">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                            </div>
                                            <img src="{{ asset('assets/frontEnd/images/ad-sm.png') }}" class="img-fluid" alt="">
                                            <div class="ad-list-info">
                                                <h5>Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
                                                <p>Experience the pinnacle of smartphone innovation with the Apple iPhone 12. Boasting a sleek design and powerful performance, this cutting-edge device redefines what a smartphone can do.</p>
                                                <span><i class="bi bi-geo-alt"></i> Location, location</span>
                                            </div>
                                            <a href="#" class="btn btn-outline ms-auto">Delete</a>
                                        </div>
                                        <div class="ad-list-item  sold">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                            </div>
                                            <img src="{{ asset('assets/frontEnd/images/ad-sm.png') }}" class="img-fluid" alt="">
                                            <div class="ad-list-info">
                                                <h5>Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
                                                <p>Experience the pinnacle of smartphone innovation with the Apple iPhone 12. Boasting a sleek design and powerful performance, this cutting-edge device redefines what a smartphone can do.</p>
                                                <span><i class="bi bi-geo-alt"></i> Location, location</span>
                                            </div>
                                            <a href="#" class="btn btn-outline ms-auto">Delete</a>
                                        </div>
                                        <div class="ad-list-item  expired">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                            </div>
                                            <img src="{{ asset('assets/frontEnd/images/ad-sm.png') }}" class="img-fluid" alt="">
                                            <div class="ad-list-info">
                                                <h5>Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
                                                <p>Experience the pinnacle of smartphone innovation with the Apple iPhone 12. Boasting a sleek design and powerful performance, this cutting-edge device redefines what a smartphone can do.</p>
                                                <span><i class="bi bi-geo-alt"></i> Location, location</span>
                                            </div>
                                            <a href="#" class="btn btn-outline ms-auto">Delete</a>
                                        </div>
                                        <div class="ad-list-item  live">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                            </div>
                                            <img src="{{ asset('assets/frontEnd/images/ad-sm.png') }}" class="img-fluid" alt="">
                                            <div class="ad-list-info">
                                                <h5>Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
                                                <p>Experience the pinnacle of smartphone innovation with the Apple iPhone 12. Boasting a sleek design and powerful performance, this cutting-edge device redefines what a smartphone can do.</p>
                                                <span><i class="bi bi-geo-alt"></i> Location, location</span>
                                            </div>
                                            <a href="#" class="btn btn-outline ms-auto">Delete</a>
                                        </div>


                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="my-ratings-tab-pane" role="tabpanel" aria-labelledby="my-ratings-tab" tabindex="0">

                                <nav class="ad-filter filters-button-group mb-3">
                                    <button class="btn btn-filter is-checked" data-filter="*">All</button>
                                    <button class="btn btn-filter" data-filter="latest">Latest</button>
                                    <button class="btn btn-filter" data-filter="buyer">Buyer</button>
                                    <button class="btn btn-filter" data-filter="seller">Seller</button>
                                </nav>

                                <div class="rating-warpper">
                                    <div class="rating-list ad-list-item latest">
                                        <div class="rating-user-profile">
                                            <img src="assets/images/user.png" class="img-fluid" alt="">
                                            <div class="rating-user">
                                                <h4>Name</h4>
                                                <span>Buyer</span>
                                            </div>
                                        </div>

                                        <div class="rating-sec pb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <span>3 Days ago</span>
                                        </div>
                                        <p>I recently purchased an item from this seller and I couldn't be happier with the entire transaction. From start to finish, the experience was seamless. Communication was prompt and clear, addressing all my inquiries efficiently. The item arrived quickly and was exactly as described, if not better! The seller took great care in packaging the item, ensuring it arrived in pristine condition. I highly recommend this seller to anyone looking for a reliable and trustworthy source. I'll definitely be a returning customer in the future!</p>

                                        <div class="btn_group mt-3">
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-hand-thumbs-up"></i> Call Now</a>
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-reply"></i> Call Now</a>
                                        </div>
                                    </div>
                                    <div class="rating-list ad-list-item buyer">
                                        <div class="rating-user-profile">
                                            <img src="assets/images/user.png" class="img-fluid" alt="">
                                            <div class="rating-user">
                                                <h4>Name</h4>
                                                <span>Buyer</span>
                                            </div>
                                        </div>

                                        <div class="rating-sec pb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <span>3 Days ago</span>
                                        </div>
                                        <p>I recently purchased an item from this seller and I couldn't be happier with the entire transaction. From start to finish, the experience was seamless. Communication was prompt and clear, addressing all my inquiries efficiently. The item arrived quickly and was exactly as described, if not better! The seller took great care in packaging the item, ensuring it arrived in pristine condition. I highly recommend this seller to anyone looking for a reliable and trustworthy source. I'll definitely be a returning customer in the future!</p>

                                        <div class="btn_group mt-3">
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-hand-thumbs-up"></i> Call Now</a>
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-reply"></i> Call Now</a>
                                        </div>
                                    </div>

                                    <div class="rating-list ad-list-item seller">
                                        <div class="rating-user-profile">
                                            <img src="assets/images/user.png" class="img-fluid" alt="">
                                            <div class="rating-user">
                                                <h4>Name</h4>
                                                <span>Buyer</span>
                                            </div>
                                        </div>

                                        <div class="rating-sec pb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <span>3 Days ago</span>
                                        </div>
                                        <p>I recently purchased an item from this seller and I couldn't be happier with the entire transaction. From start to finish, the experience was seamless. Communication was prompt and clear, addressing all my inquiries efficiently. The item arrived quickly and was exactly as described, if not better! The seller took great care in packaging the item, ensuring it arrived in pristine condition. I highly recommend this seller to anyone looking for a reliable and trustworthy source. I'll definitely be a returning customer in the future!</p>

                                        <div class="btn_group mt-3">
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-hand-thumbs-up"></i> Call Now</a>
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-reply"></i> Call Now</a>
                                        </div>
                                    </div>

                                    <div class="rating-list ad-list-item latest">
                                        <div class="rating-user-profile">
                                            <img src="assets/images/user.png" class="img-fluid" alt="">
                                            <div class="rating-user">
                                                <h4>Name</h4>
                                                <span>Buyer</span>
                                            </div>
                                        </div>

                                        <div class="rating-sec pb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <span>3 Days ago</span>
                                        </div>
                                        <p>I recently purchased an item from this seller and I couldn't be happier with the entire transaction. From start to finish, the experience was seamless. Communication was prompt and clear, addressing all my inquiries efficiently. The item arrived quickly and was exactly as described, if not better! The seller took great care in packaging the item, ensuring it arrived in pristine condition. I highly recommend this seller to anyone looking for a reliable and trustworthy source. I'll definitely be a returning customer in the future!</p>

                                        <div class="btn_group mt-3">
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-hand-thumbs-up"></i> Call Now</a>
                                            <a href="#" class="btn btn-callnow mb-2 w-auto"><i class="bi bi-reply"></i> Call Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
