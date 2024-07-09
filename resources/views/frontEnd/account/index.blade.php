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

                    @include('frontEnd.includes.message')

                    <div class="account-start">
                        <h3>My Account</h3>
                        <div class="account-details">
                            <img src="{{ uploaded_asset_profile(auth()->user()->image) }}" class="img-fluid" alt="">
                            <a href="{{ route('front.logout') }}" class="btn btn-logout d-block d-md-none"><i class="bi bi-box-arrow-left"></i> Logout</a>
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

                            <div class="button-flex">
                                <a href=""><a href="{{ route('user.change.password') }}" class="btn btn-outline ms-auto"><i class="bi bi-lock-fill"></i>Change Password</a></a>
                                <a href="{{ route('edit.profile') }}" class="btn btn-outline  bg_primary border-0 text-white"><i class="bi bi-pencil-fill"></i>Edit Profile</a>
                            </div>

                        </div>

                    </div>
                    <div class="account-end">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="my-ads-tab" data-bs-toggle="tab" data-bs-target="#my-ads-tab-pane" type="button" role="tab" aria-controls="my-ads-tab-pane" aria-selected="true">My Ads</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="my-wishlist-tab" data-bs-toggle="tab" data-bs-target="#my-wishlist-tab-pane" type="button" role="tab" aria-controls="my-wishlist-tab-pane" aria-selected="false">Wishlist</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="my-ads-tab-pane" role="tabpanel" aria-labelledby="my-ads-tab" tabindex="0">

                                <nav class="ad-filter filters-button-group">
                                    <button class="btn btn-filter is-checked" data-filter="*">All Ads <span>({{ $posts->count() }})</span></button>
                                    <button class="btn btn-filter" data-filter="pending">Under Review <span>({{ $total_pending }})</span></button>
                                    <button class="btn btn-filter" data-filter="approved">Live <span>({{ $total_approve }})</span></button>
                                    <button class="btn btn-filter" data-filter="sold">Sold <span>({{ $total_sold }})</span></button>
                                    <button class="btn btn-filter" data-filter="rejected">Rejected <span>({{ $total_rejected }})</span></button>
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

                                                <div class="button-flex">
                                                    @if($post->status == 'approved')
                                                        <a href="{{ route('post.sold', ['id' => $post->id]) }}" class="btn btn-outline bg-info border-0 text-white"><i class="bi bi-building-check"></i>Sold</a>
                                                    @endif

                                                    <a href="{{ route('post.view', ['type' => 'user','id' => $post->id]) }}" class="btn btn-outline bg_primary border-0 text-white"><i class="bi bi-eye"></i>View</a>
                                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-outline"><i class="bi bi-pencil-fill"></i>Edit</a>
                                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-outline bg-danger text-white border-0"><i class="bi bi-trash3"></i>Withdraw</a>
                                                </div>

                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
{{--                        end first section--}}
                        <div class="tab-pane fade" id="my-wishlist-tab-pane" role="tabpanel" aria-labelledby="my-wishlist-tab" tabindex="0">

                            <div class="row g-3">
                                @forelse($wishlists as $post)
                                    <div class="col-md-3" id="list_id_{{$post->list_id}}">
                                        <div class="card ad-card">
                                            <button class="btn btn-wishlist text-white bg-danger" onclick="deleteFromList('{{ $post->list_id }}')"><i class="bi bi-trash"></i></button>
                                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                                <div class="card-img-warpper">
                                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state ?? "" }}, {{ $post->city ?? "" }}</span>
                                                    <span class="property-category">{{ $post->category_name ?? "" }}</span>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-price">USD {{ $post->price ?? "" }} </h5>
                                                    <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <span class="text-center">Wishlist is empty</span>
                                @endforelse
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function deleteFromList(wishlistId)
        {
            if(wishlistId){
                $.ajax({
                    url: "{{ route('wishlist.delete') }}",
                    type: 'get',
                    data: {
                        list_id: wishlistId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.http_status == 200) {
                            toastr.success(response.message);
                            $('#list_id_' + wishlistId).remove();
                        }

                        if(response.http_status == 500) {
                            toastr.error(response.message);
                        }

                        if(response.http_status == 404) {
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

