@extends('frontEnd.layouts.layout')

@section('content')
    <section class="categories_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category_slider owl-carousel owl-theme">
                        @foreach(CommonFunction::getCategory() as $category)
                            <div class="item">
                                <div class="categories-box {{ ($category->id == $category_id) ? 'active' : '' }}" data-id="{{$category->id}}">
                                    @if ($category->icon != null)
                                        <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                                    @endif
                                    {{ $category->getTranslation('name', getLocaleLang()) ?? $category->en_name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="filter-box-section">
        <div class="container" id="load_search_bar_id">
            {!! $searchBarHtml ?? "" !!}
        </div>
    </section>

    <section class="popular-ads-section">
        <div class="container" id="load_post_id">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.detail-category', ['cat_id' => $category_id]) }}">{{ $category_name }}</a></li>
                </ol>
            </nav>

            <div class="section-title title-flex">
                <h3>{{ $category_name }} <span>{{ $category_wise_total_post }} {{ __('post.ads') }}</span></h3>
                <div class="row row-cols-lg-auto g-3 align-items-center">

                    <div class="col-12">
                        <label class="form-check-label">
                            {{ __('post.sort_by') }}:
                        </label>
                    </div>
                    <div class="col-12">
                        <select class="form-select" id="inlineFormSelectPref" onchange="sortingThePosts(this.value)">
                            <option value="">-{{ __('post.select') }}-</option>
                            <option value="1">{{ __('post.newest') }}</option>
                            <option value="2">{{ __('post.low_to_high') }}</option>
                            <option value="3">{{ __('post.high_to_low') }}</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="category-inner">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            @forelse($posts as $post)
                                <div class="col-md-12">
                                    <div class="card mb-3 ad-card">
                                        <button href="#" class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                                </a>
                                            </div>

                                            <div class="col-md-7">
                                                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                                    <div class="card-body">
                                                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>
                                                        <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                                        {{--                                                <ul>--}}
                                                        {{--                                                    <li>--}}
                                                        {{--                                                        <i class="bi bi-calendar-check"></i>--}}
                                                        {{--                                                        <span>20218</span>--}}
                                                        {{--                                                    </li>--}}

                                                        {{--                                                    <li>--}}
                                                        {{--                                                        <i class="bi bi-speedometer2"></i>--}}
                                                        {{--                                                        <span>56,000 km</span>--}}
                                                        {{--                                                    </li>--}}
                                                        {{--                                                    <li>--}}
                                                        {{--                                                        <i class="bi bi-globe"></i>--}}
                                                        {{--                                                        <span>Regional Specs</span>--}}
                                                        {{--                                                    </li>--}}
                                                        {{--                                                </ul>--}}

                                                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                                        <div class="list-buttons">
                                                            @if(!empty(CommonFunction::getPostOwnerPhoneNumber($post->created_by)))
                                                                <a href="#" class="btn btn-callnow mb-2"><i class="bi bi-telephone m-2"></i> {{ CommonFunction::getPostOwnerPhoneNumber($post->created_by) }}</a>
                                                            @endif

                                                            @if(!empty(CommonFunction::getPostOwnerPhoneNumber($post->created_by)) || !empty(CommonFunction::getPostOwnerWhatsApp($post->created_by)))
                                                                @php
                                                                    $whatsApp = !empty(CommonFunction::getPostOwnerWhatsApp($post->created_by)) ? CommonFunction::getPostOwnerWhatsApp($post->created_by) : CommonFunction::getPostOwnerPhoneNumber($post->created_by);
                                                                @endphp

                                                                <a href="https://wa.me/{{ $whatsApp }}?text=Hi There.." target="_blank" class="btn btn-whatsapp"><i class="bi bi-whatsapp me-2"></i>
                                                                    WhatsApp
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <span class="join-date">Posted On : {{ date('Y-m-d', strtotime($post->updated_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    <div class="col-md-3">
                        <img src="{{ asset('assets/frontEnd/images/ad-md-img.jpg') }}" class="img-fluid rounded-2 w-100" alt="">
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

    <script>
        $('.categories-box').click(function() {
            if(!$(this).hasClass('active')) {
                getCategoryWiseSearchBar($(this).attr("data-id"), '{{ route('get-category-wise-search') }}');
            }

            $('.categories-box').not(this).removeClass("active");
            $(this).addClass("active");
        });

        function getCategoryWiseSearchBar(categoryId) {
            if(categoryId != ""){
                $('#load_post_id').html("");

                $.ajax({
                    url: "{{ route('get-category-wise-search') }}",
                    type: 'get',
                    data: {
                        category_id:categoryId,
                    },
                    beforeSend: function() {
                        $('.categories-box').css('pointer-events', 'none');
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status){
                            $('#load_search_bar_id').html(response.barHtml);
                            $('#load_post_id').html(response.postHtml);
                        }
                    },
                    complete: function() {
                        $('.categories-box').css('pointer-events', 'unset');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }


        function postBarSearch()
        {
            var actionurl = $('#search_bar_form').attr('action');
            //do your own request an handle the results
            $.ajax({
                url: actionurl,
                type: 'post',
                data: $("#search_bar_form").serialize(),
                beforeSend: function() {
                    $('form *').prop('disabled', true);
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data.status) {
                        $('#load_post_id').html(data.postHtml);
                    }
                },
                complete: function() {
                    $('form *').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        }


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
                            toastr.success(response.message);
                        }

                        if(response.http_status == 201) {
                            toastr.success(response.message);
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

        function sortingThePosts(sortingValue){
            var actionurl = $('#search_bar_form').attr('action');

            var data = {
                'sorting_value' : sortingValue
            };

            $.ajax({
                url: actionurl,
                type: 'post',
                data: $("#search_bar_form").serialize() + '&' + $.param(data),
                beforeSend: function() {
                    $('form *').prop('disabled', true);
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data.status) {
                        $('#load_post_id').html(data.postHtml);
                        $("#inlineFormSelectPref").val(sortingValue).change();
                    }
                },
                complete: function() {
                    $('form *').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        }
    </script>

@endsection
