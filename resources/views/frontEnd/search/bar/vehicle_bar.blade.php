<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <form action="{{ route('post.data.filter') }}" method="post" id="search_bar_form">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="sub_category_id" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->getTranslation('name', \Illuminate\Support\Facades\App::getLocale() ?? "en") ?? $subCategory->en_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.sub_category') }}</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="state_id" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->getTranslation('name', App::getLocale() ?? 'en') }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.state') }}</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="brand_id" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{ $brand->getTranslation('name', App::getLocale() ?? 'en') }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.make') }}</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="price_range" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($price_ranges as $price)
                                <option value="{{ $price }}">USD {{ $price }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.price_range') }}</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="model_year" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($years as $key => $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.year') }}</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="km" onchange="postBarSearch()">
                            <option value="">-{{ __('post.select') }}-</option>
                            @foreach($km as $key => $data)
                                <option value="{{ $data }}">{{ $data }}Km</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('post.kilometers') }}</label>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
