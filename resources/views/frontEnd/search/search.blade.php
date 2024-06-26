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
                                    <h4>{{ $category->en_name }}</h4>
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
{{--            <div class="section-title title-flex">--}}
{{--                <h3>--}}
{{--                    Popular Ads--}}
{{--                </h3>--}}
{{--                <a href="#" class="page-link">See all <i class="bi bi-chevron-right"></i></a>--}}
{{--            </div>--}}
            <div class="row g-3">
                @forelse($posts as $post)
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
                                    <h5 class="card-price">SOS {{ $post->price ?? "" }}</h5>
                                    <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>
                                </div>
                                </a>
                            </div>
                    </div>
                @empty
                    <span class="text-center">No data found!</span>
                @endforelse
            </div>
        </div>
    </section>

    @include('frontEnd.modals.login-modal')
@endsection

@section('script')
    <script src="{{ asset('assets/custom-js/getCityByStateId.js') }}"></script>
    <script src="{{ asset('assets/custom-js/login.js') }}"></script>

    <script>
        $('.categories-box').click(function(){
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status){
                            $('#load_search_bar_id').html(response.barHtml);
                            $('#load_post_id').html(response.postHtml);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error)
                    }
                });
            }
        }



    </script>

    <script>
        function postBarSearch()
        {
            var actionurl = $('#search_bar_form').attr('action');
            //do your own request an handle the results
            $.ajax({
                url: actionurl,
                type: 'post',
                data: $("#search_bar_form").serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data.status) {
                        $('#load_post_id').html(data.postHtml);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error)
                }
            });
        }
    </script>

@endsection
