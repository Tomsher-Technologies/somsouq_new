<section class="top-categories-section">
    <div class="container">

        <div class="section-title">
            <h3>Top Categories</h3>
        </div>

        <div class="row g-3">
            @forelse(CommonFunction::getCategory() as $category)
                <div class="col-6 col-md-2">
                    <a href="{{ route('post.detail-category', ['cat_id' => $category->id]) }}">
                        <div class="categories-box">
                            @if ($category->icon != null)
                                <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                            @endif
                            <h4>{{ $category->en_name }}</h4>
                        </div>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
