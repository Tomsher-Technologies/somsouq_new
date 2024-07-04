@extends('frontEnd.layouts.layout')

@section('content')
    @include('frontEnd.includes.banner-section')
    @include('frontEnd.includes.top-categories')

    @include('frontEnd.includes.add-section')

    <section class="popular-ads-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Ads</h3>
{{--                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>--}}
            </div>
            <div class="row g-3">
                @forelse($popular_ads as $ad)
                    <div class="col-md-3">
                        <div class="card ad-card">
                            <button class="btn btn-wishlist"><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $ad->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($ad->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($ad->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $ad->state }}, {{ $ad->city }}</span>

                                    <span class="wishlist-icon"><i class="bi bi-heart"></i></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $ad->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $ad->title ? substr($ad->title, 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <span class="text-center">Ad not found!</span>
                @endforelse
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')


    <section class="popular-properties-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Properties for Rent</h3>
                <a href="{{ route('post.detail-category', ['cat_id' => 1]) }}" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                @if(!empty($posts[1]))
                @forelse($posts[1] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist"><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

                                        <span class="wishlist-icon"><i class="bi bi-heart"></i></span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                @empty
                @endforelse
                @endif
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')


    <section class="popular-properties-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Properties for Sale</h3>
                <a href="{{ route('post.detail-category', ['cat_id' => 2]) }}" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                @if(!empty($posts[2]))
                @forelse($posts[2] as $post)
                    <div class="col-md-3">
                        <div class="card ad-card">
                            <button class="btn btn-wishlist"><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

                                    <span class="wishlist-icon"><i class="bi bi-heart"></i></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
                @endif
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Vehicles for Rent</h3>
                <a href="{{ route('post.detail-category', ['cat_id' => 3]) }}" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                @if(!empty($posts[3]))
                @forelse($posts[3] as $post)
                    <div class="col-md-3">
                        <div class="card ad-card">
                            <button class="btn btn-wishlist"><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

                                    <span class="wishlist-icon"><i class="bi bi-heart"></i></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
                @endif
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Vehicles for Sale</h3>
                <a href="{{ route('post.detail-category', ['cat_id' => 4]) }}" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                @if(!empty($posts[4]))
                @forelse($posts[4] as $post)
                    <div class="col-md-3">
                        <div class="card ad-card">
                            <button class="btn btn-wishlist"><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

                                    <span class="wishlist-icon"><i class="bi bi-heart"></i></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
                @endif
            </div>
        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Fashion Items</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>

        </div>
    </section>

    @include('frontEnd.includes.add-section')

    <section class="popular-electronics-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Electronics</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </section>


    @include('frontEnd.includes.add-section')

    <section class="popular-electronics-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Health & Beauty Items</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>

        </div>
    </section>

    @include('frontEnd.modals.login-modal')

@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>
    <script src="{{ asset('assets/frontEnd/js/jquery-validation/jquery.validate.js') }}"></script>
    <script>
        $(function() {
            /**
             * Global search form validation here
             */

            $('#searchFormId').validate({
                onfocusout: false,
                highlight: function (element) {
                    $(element).focus();
                    $(element).css('border-color', 'red');
                },
                unhighlight: function(element) {
                    $(element).css('border-color', '#dee2e6');
                },
                errorPlacement: function(error, element) {},
            });
        });

    </script>
@endsection

