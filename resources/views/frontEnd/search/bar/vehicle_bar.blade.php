<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <form action="{{ route('post.data.filter') }}" method="post" id="search_bar_form">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="sub_category_id" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->en_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Sub Category</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="state_id" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($states as $key => $state)
                                <option value="{{ $key }}">{{ $state }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">State</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="brand_id" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($brands as $key => $brand)
                                <option value="{{$key}}">{{ $brand }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Make</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="price_range" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($price_ranges as $price)
                                <option value="{{ $price }}">SOS {{ $price }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Price Range</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="model_year" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($years as $key => $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Year</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="km" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($km as $key => $data)
                                <option value="{{ $data }}">{{ $data }}Km</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Kilometers</label>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
