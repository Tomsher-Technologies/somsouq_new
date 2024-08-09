@extends('frontEnd.layouts.layout')

@section('content')
    @include('frontEnd.includes.banner-section')
    @include('frontEnd.includes.top-categories')

    @include('frontEnd.includes.add-section')

    @if(count($popular_ads) > 0 && !empty(webUser()))
        <section class="popular-ads-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3>{{ __('home.popular_ads') }}</h3>
                    {{--                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>--}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="list-properties owl-theme">
                            @forelse($popular_ads as $post)
                                <div class="card ad-card">
                                    <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                    <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                        <div class="card-img-warpper">
                                            <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                            <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                            <span class="property-category">{{ CommonFunction::getCategoryName($post->category_id)->getTranslation('name', getLocaleLang()) }}</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                            <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <span class="text-center">{{ __('home.ad_not_found') }}</span>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($posts[1]))
        <section class="popular-properties-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3> {{ __('home.popular_property_for_rent') }} </h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 1]) }}" class="page-link d-none d-md-block">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">

                    @forelse($posts[1] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    @if(!empty($posts[2]))
        <section class="popular-properties-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3> {{ __('home.popular_property_for_sale') }}</h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 2]) }}" class="page-link">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">

                    @forelse($posts[2] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif

    @if(!empty($posts[3]))
        <section class="popular-cars-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3> {{ __('home.popular_vehicles_for_rent') }}</h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 3]) }}" class="page-link">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">

                    @forelse($posts[3] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif

    @if(!empty($posts[4]))
        <section class="popular-cars-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3>{{ __('home.popular_vehicles_for_sale') }}</h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 4]) }}" class="page-link">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">
                    @forelse($posts[4] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif


    @if(!empty($posts[5]))
        <section class="popular-properties-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3> {{ __('home.popular_fashion_items') }} </h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 5]) }}" class="page-link d-none d-md-block">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">

                    @forelse($posts[5] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
    @endif


    @if(!empty($posts[6]))
        <section class="popular-properties-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3> {{ __('home.popular_electronics') }} </h3>
                    <a href="{{ route('post.detail-category', ['cat_id' => 6]) }}" class="page-link d-none d-md-block">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3">

                    @forelse($posts[6] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    @include('frontEnd.includes.add-section')

    @if(!empty($posts[7]))
        <section class="popular-electronics-section">
            <div class="container">
                <div class="section-title title-flex">
                    <h3>{{ __('home.popular_health_beauty_item') }}</h3>
                    <a href="#" class="page-link">{{ __('home.see_all') }} <i class="bi bi-chevron-right"></i></a>
                </div>

            </div>
        </section>
    @endif


    @include('frontEnd.modals.login-modal')

@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>

    <script>
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

        $('#searchFormId2').validate({
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

        // btn-wishlist
        function addToWishlist(postId)
        {
            if(postId){
                $.ajax({
                    url: "{{ route('wishlist.add') }}",
                    type: 'get',
                    data: {
                        post_id:postId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.http_status == 200) {
                            toastr.success(response.message, {timeOut: 500});
                        }

                        if(response.http_status == 201) {
                            toastr.success(response.message, {timeOut: 500});
                        }

                        if(response.http_status == 500) {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }
    </script>
@endsection

