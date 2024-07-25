{{--<div class="row g-3">--}}
{{--    @forelse($posts as $post)--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="card ad-card">--}}
{{--                <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>--}}
{{--                <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">--}}
{{--                    <div class="card-img-warpper">--}}
{{--                        <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top img-fluid" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">--}}
{{--                        <span class="card-location"><i class="bi bi-geo-alt"></i> {{ $post->state }}, {{ $post->city }}</span>--}}

{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-price">USD {{ $post->price ?? "" }}</h5>--}}
{{--                        <h4 class="card-title">{{ $post->title ? substr($post->title, 0, 80) : "" }}</h4>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @empty--}}
{{--        <span class="text-center">No data found!</span>--}}
{{--    @endforelse--}}
{{--</div>--}}


<nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&quot;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('post.detail-category', ['cat_id' => $category_id]) }}">{{ $category_name }}</a></li>
    </ol>
</nav>

<div class="section-title title-flex">
    <h3>{{ $category_name }} <span>{{ $category_wise_total_post }} {{ __('post.ads') }}</span></h3>
    <form class="row row-cols-lg-auto g-3 align-items-center">

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
    </form>
</div>


<div class="category-inner">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-12">
                        <div class="card mb-3 ad-card">
                            <button class="btn btn-wishlist" @guest data-bs-toggle="modal" data-bs-target="#loginModal" @else onclick="addToWishlist('{{ $post->id }}')" @endguest><i class="bi bi-heart"></i></button>
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <a href="{{ route('public.view', ['type' => 'public', 'id' => $post->id]) }}">
                                    <img src="{{ CommonFunction::showPostImage($post->id) }}" class="card-img-top" alt="{{ CommonFunction::getPostImageName($post->id) }}" style="height: 234px; object-fit: cover">
                                    </a>
                                    {{--                                                <span class="property-category">Properties for Rent</span>--}}
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
