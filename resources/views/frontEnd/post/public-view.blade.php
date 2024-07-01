@extends('frontEnd.layouts.layout')

@section('stylesheet')
    <style>
        .owl-item {height: 0;}
        .owl-item.active {height: auto;}
    </style>
@endsection
@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="product-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="sync1" class="owl-carousel owl-theme">
                        @forelse($images as $image)
                            <div class="item">
                                <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" alt="{{ $image->file_original_name }}">
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                        @forelse($images as $image)
                            <div class="item">
                                <img src="{{ CommonFunction::showPostImageByFileName($image->file_name) }}" alt="{{ $image->file_original_name }}">
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-detail-title">
                                <h3>{{ $post->title ?? "" }}</h3>
                                <div class="btn-group gap-2 ms-auto">
                                    <a href="#" class="btn btn-outline"><i class="bi bi-heart me-1"></i> Favorite</a>
                                    <a href="#" class="btn btn-outline"><i class="bi bi-share"></i> Share</a>
                                </div>
                            </div>

                            <h5>Specifications:</h5>
                            <div>
                                {!! $postDetailHtml ?? "" !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="price-seller-info">

                        <div class="product-price-warpper">
                            <h3>SOS {{ $post->price ?? "" }}</h3>
{{--                            <span class="badge">40% OFF</span>--}}
{{--                            <h5>SOS 6440</h5>--}}
                        </div>
                        <div class="product-seller-info">
                            <div class="seller-warpper">
                                <div class="seller-thumb">
                                    <img src="{{ asset('assets/frontEnd/images/user.png') }}" width="50" class="img-fluid" alt="">
                                    <span class="online"></span>
                                    <span class=""></span>
                                </div>
                                <div class="seller-info">
                                    <h3>{{ CommonFunction::getPostOwnerName($post->created_by) }}</h3>
                                    <h5>Active Now</h5>
                                </div>
                            </div>
                            @if(!empty(CommonFunction::getPostOwnerPhoneNumber($post->created_by)))
                                <a href="#" class="btn btn-callnow mb-2"><i class="bi bi-telephone m-2"></i> {{ CommonFunction::getPostOwnerPhoneNumber($post->created_by) }}</a>

                                <a href="https://wa.me/{{ CommonFunction::getPostOwnerPhoneNumber($post->created_by) }}?text=Hi There.." target="_blank" class="btn btn-callnow"><i class="bi bi-whatsapp me-2"></i>
                                    WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="google-ad mt-3">
                        <img src="{{ asset('assets/frontEnd/images/ad-md-img.jpg') }}" class="img-fluid rounded-2" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>
@endsection

