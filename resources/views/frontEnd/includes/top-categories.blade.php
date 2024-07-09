<section class="top-categories-section">
    <div class="container">

        <div class="section-title">
            <h3>Top Categories</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="top-categories owl-carousel owl-theme">
                    @forelse(CommonFunction::getCategory() as $category)
                            <a href="{{ route('post.detail-category', ['cat_id' => $category->id]) }}">
                                <div class="categories-box">
                                    @if ($category->icon != null)
                                        <img src="{{ uploaded_asset($category->icon) }}" class="img-fluid" alt="icon">
                                    @endif
                                    <h4>{{ $category->en_name }}</h4>
                                </div>
                            </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
