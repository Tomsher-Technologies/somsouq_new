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
            display: none !important;
        }
        .ad-filter{
            border-bottom: none !important;
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
                            <img src="{{ uploaded_asset_profile(auth()->user()->image) }}" class="img-fluid" alt="">
                            <div class="account-info">
                                <h4>{{ auth()->user()->name ?? ucfirst(auth()->user()->name) }}</h4>
                                @if(!empty(auth()->user()->email))
                                    <a href="#"> <i class="bi bi-envelope"></i> {{ auth()->user()->email }}</a>
                                @else
                                    {{ auth()->user()->username }}
                                @endif

                                @if(!empty(auth()->user()->phone_number))
                                    <a href="#"> <i class="bi bi-telephone"></i>{{ auth()->user()->phone_number }}</a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="account-end">
                        @include('frontEnd.includes.message')

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
                                    <button class="btn btn-filter is-checked" data-filter="*">All Ads <span>({{ $posts->count() }})</span></button>
                                    <button class="btn btn-filter" data-filter="pending">Under Review <span>({{ $total_pending }})</span></button>
                                </nav>

                                <div class="ad-filter-content">
                                    <div class="ad-filter-warpper">
                                        @forelse($posts as $post)
                                            <div class="ad-list-item {{ $post->status }}">
                                                <img src="{{ CommonFunction::showPostImage($post->id) }}" class="img-fluid" alt="" height="144" width="144" style="object-fit: cover">
                                                <div class="ad-list-info">
                                                    <h5>{{ $post->title ?? "" }}</h5>
                                                    <p>{{ $post->description ? substr($post->description, 0, 185) : "" }}</p>
                                                    <span><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>
                                                </div>

                                                <div class="d-flex justify-content-end gap-3 ms-auto">
                                                    <a href="{{ route('post.view', ['id' => $post->id]) }}" class="btn btn-outline ms-auto bg_primary border-0 text-white"><i class="bi bi-eye"></i>View</a>
                                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-outline ms-auto"><i class="bi bi-pencil-fill"></i>Edit</a>
                                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-outline ms-auto bg-danger text-white border-0"><i class="bi bi-trash3"></i>Delete</a>
                                                </div>

                                            </div>
                                        @empty
                                        @endforelse
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
