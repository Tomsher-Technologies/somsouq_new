@extends('frontEnd.layouts.layout')

@section('content')
    <section class="popular-ads-section">
        <div class="container">
            <div class="section-title title-flex">
                <h3>{{ __('user.wishlist') }}</h3>
            </div>
            <div class="row g-3">
                @forelse($posts as $post)
                    <div class="col-md-3" id="list_id_{{$post->list_id}}">
                        <div class="card ad-card">
                            <button class="btn btn-wishlist text-white bg-danger" onclick="deleteFromList('{{ $post->list_id }}')"><i class="bi bi-trash"></i></button>
                            <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                <div class="card-img-warpper">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    <span class="card-location"><i class="bi bi-geo-alt"></i> {{ CommonFunction::getStateName($post->state) }}, {{ CommonFunction::getCityName($post->city) }}</span>
                                    <span class="property-category">{{ CommonFunction::getCategoryName($post->category_id)->getTranslation('name', getLocaleLang()) }}</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-price">USD {{ $post->price ?? "" }} </h5>
                                    <h4 class="card-title">{{ $post->title ? substr($post->getTranslation('title', getLocaleLang()), 0, 80) : "" }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <span class="text-center">Wishlist is empty</span>
                @endforelse
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
