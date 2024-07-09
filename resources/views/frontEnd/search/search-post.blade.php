<div class="row g-3">
    @forelse($posts as $post)
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
        <span class="text-center">No data found!</span>
    @endforelse
</div>
