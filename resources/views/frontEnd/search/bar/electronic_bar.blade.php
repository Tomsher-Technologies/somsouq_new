<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <form action="{{ route('post.data.filter') }}" method="post" id="search_bar_form">
                <input type="hidden" name="category_id" id="cat_id" value="{{ $category_id }}">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="electronic_sub_category_id" name="sub_category_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->getTranslation('name', getLocaleLang()) ?? $subCategory->en_name }}</option>
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
                                    <option value="{{ $state->id }}">{{ $state->getTranslation('name', getLocaleLang()) }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.state') }}</label>
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

                    <div class="col-md-2 common-div">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="e_brand_id" name="brand_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{ $brand->getTranslation('name', getLocaleLang()) }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.brand_name') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2 common-div">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="e_type_id" name="type_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                            </select>
                            <label for="floatingSelect">{{ __('post.type') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2 game-div" style="display: none">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="genre_id" name="genre_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}">{{ $genre->getTranslation('name', getLocaleLang()) }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.genre') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2 game-div" style="display: none">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="platform_id" name="platform_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{ $platform->getTranslation('name', getLocaleLang()) }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.platform') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select border-0" aria-label="Floating label select example" name="condition" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($conditions as $key => $condition)
                                    <option value="{{ $key }}">{{ $condition }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.condition') }}</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
