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
            <div class="row">
                <div class="col-md-12">
                    <div class="list-properties owl-theme">
                        @forelse($popular_ads as $ad)
                        <div class="card ad-card">
                            <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $ad->id }}')" @endguest><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $ad->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($ad->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($ad->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $ad->state }}, {{ $ad->city }}</span>
                                    <span class="property-category">{{ $ad->category_name ?? "" }}</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $ad->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $ad->title ? substr($ad->title, 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                        @empty
                            <span class="text-center">Ad not found!</span>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="popular-properties-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Properties for Rent</h3>
                <a href="{{ route('post.detail-category', ['cat_id' => 1]) }}" class="page-link d-none d-md-block">See all <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3">
                @if(!empty($posts[1]))
                @forelse($posts[1] as $post)
                        <div class="col-md-3">
                            <div class="card ad-card">
                                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <div class="card-img-warpper">
                                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>
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
                            <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

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
                            <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

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
                            <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>

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


    <section class="popular-cars-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>Popular Fashion Items</h3>
                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>
            </div>

        </div>
    </section>

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

