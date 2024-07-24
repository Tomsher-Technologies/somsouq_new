@extends('frontEnd.layouts.layout')

@section('meta-tag')
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $post->getTranslation('title', App::getLocale() ?? "en") }}" />
    <meta property="og:description" content="{{ $post->description ? substr($post->getTranslation('description', App::getLocale() ?? "en"), 0, 185) : "" }}" />
    <meta property="og:image" content="{{ CommonFunction::showPostImage($post->id) }}" />
    <meta property="og:type" content="website" />
@endsection

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
                <div class="col-md-9">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post.detail-category', ['cat_id' => $post->category_id]) }}">{{ CommonFunction::getCategoryName($post->category_id)->getTranslation('name', App::getLocale() ?? 'en') }}</a></li>
                            <li class="breadcrumb-item">{{ CommonFunction::getSubCategoryName($post->sub_category_id)->getTranslation('name', App::getLocale() ?? 'en') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->tracking_number }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="product-detail-section">
        <div class="container">
            <div class="detail-title-flex">
                <div class="product-detail-title">
                    <h3>{{ $post->getTranslation('title', App::getLocale() ?? "en") }}</h3>
                    <div class="detail-sub-title">
                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}
                        </span>
                        <span>Posted {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span>
                    </div>
                    {{--                        <h5>Posted {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</h5>--}}
                    {{--                        <span class="card-location"><i class="bi bi-geo-alt"></i> Abuja, Asokoro</span>| <span>Posted {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span>--}}
                </div>
                <div class="product-price-warpper">
                    <h3>USD {{ $post->price ?? "" }}</h3>
                    {{--                            <span class="badge">40% OFF</span>--}}
                    {{--                            <h5>SOS 6440</h5>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">

                    <div class="card border-0 rounded-4">
                        <div class="card-body p-0">
                            <div class="product_action-btn">
                                <button class="btn btn-wishlist me-2" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                                <button class="btn btn-wishlist" data-id="{{ $post->id  }}" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="bi bi-share"></i></button>
                            </div>
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
                        </div>
                    </div>

{{--                    Dynamically will update item overview, additional information and description--}}
                        {!! $postDetailHtml ?? "" !!}
{{--                    end section--}}

                    <div class="row mt-5 mb-5">
                        <div class="col-md-12">
                            <h4 class="mb-3">{{ __('post.description') }}</h4>
                            <div class="additional-details">
                                <div class="card product-card">
                                    <div class="card-body p-0">
                                        {{ $post->getTranslation('description', App::getLocale() ?? "en") }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="price-seller-info">

                        <div class="product-seller-info">
                            <div class="seller-warpper">
                                <div class="seller-thumb">
                                    <img src="{{ CommonFunction::getPostOwnerProfile($post->created_by) }}" width="50" class="img-fluid rounded-circle" alt="">
                                    <span class="online"></span>
                                    <span class=""></span>
                                </div>
                                <div class="seller-info">
                                    <h3>{{ CommonFunction::getPostOwnerName($post->created_by) }}</h3>
{{--                                    <h5>Active Now</h5>--}}
                                    <span class="join-date">{{ __('post.joined_on') }} {{ \App\Libraries\CommonFunction::getPostUserJoinDate($post->created_by) }}</span>
                                </div>
                            </div>

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
                    </div>

                    <div class="property-safety-tips mt-3">
                        <h3>{{ __('post.safety_tips') }} <i class="bi bi-lightbulb"></i></h3>
                        <ul>
                            @forelse($safetyTips as $tip)
                                <li>
                                    {{ $tip->getTranslation('name', \Illuminate\Support\Facades\App::getLocale() ?? "en") }}
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <p class="py-3">Is there an issue? <a href="#" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else data-bs-toggle="modal" data-bs-target="#reportModal" @endguest>Report this ad</a></p>
                    <div class="google-ad mt-3">
                        <img src="{{ asset('assets/frontEnd/images/ad-md-img.jpg') }}" class="img-fluid rounded-2" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
    @include('frontEnd.modals.social-link-modal')
    @include('frontEnd.modals.report-modal')
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>

    <script>
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

        $('#shareModal').on('shown.bs.modal', function (e) {
            let postId = e.relatedTarget.getAttribute('data-id');

            $.ajax({
                url: "{{ route('social.share') }}",
                type: 'get',
                data: {
                    post_id: postId,
                },
                beforeSend: function() {
                    $('#whatsapp_id').css('pointer-events', 'none');
                    $('#facebook_id').css('pointer-events', 'none');
                    $('#btn_copy').css('pointer-events', 'none');
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.status == "success") {
                        $('#whatsapp_id').attr("href", response.data.whatsapp);
                        $('#facebook_id').attr("href", response.data.facebook);
                        $('#textbox').val(response.url);
                    }
                },
                complete: function() {
                    $('#whatsapp_id').css('pointer-events', 'unset');
                    $('#facebook_id').css('pointer-events', 'unset');
                    $('#btn_copy').css('pointer-events', 'unset');
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        })

        $('#btn_copy').click( function() {
            clipboardText = $('#textbox').val();
            navigator.clipboard.writeText(clipboardText);
            toastr.success('Copied clipboard');
        });

        $('#reportFormId').validate({
            highlight: function (element) {
                $(element).css('border-color', 'red');
            },
            unhighlight: function(element) {
                $(element).css('border-color', '#dee2e6');
            },
            errorPlacement: function(error, element) {},

            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        if(response.status) {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }

                        $('#reportModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        });
    </script>
@endsection

