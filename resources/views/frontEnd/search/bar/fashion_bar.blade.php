<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <form action="{{ route('post.data.filter') }}" method="post" id="search_bar_form">
                <input type="hidden" name="category_id" id="cat_id" value="{{ $category_id }}">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="fashion_sub_category_id" name="sub_category_id" onchange="postBarSearch()">
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

                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" name="color_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{ $color->getTranslation('name', getLocaleLang()) }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">{{ __('post.color') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="type_id" name="type_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                            </select>
                            <label for="floatingSelect">{{ __('post.type') }}</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Floating label select example" id="material_id" name="material_id" onchange="postBarSearch()">
                                <option value="">-{{ __('post.select') }}-</option>
                            </select>
                            <label for="floatingSelect">{{ __('post.material') }}</label>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
