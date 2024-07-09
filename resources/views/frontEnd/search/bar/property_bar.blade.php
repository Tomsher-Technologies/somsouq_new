<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <form action="{{ route('post.data.filter') }}" method="post" id="search_bar_form">
            <div class="row">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="sub_category_id" id="sub_category_id" onchange="postBarSearch()">
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
                        <select class="form-select" aria-label="Floating label select example" name="price_range" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($price_ranges as $price)
                                <option value="{{ $price }}">USD {{ $price }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Price Range</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="size_range" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach($size_range as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Size (Square Meter)</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Floating label select example" name="room_number" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach(range(1, 15) as $room)
                                <option value="{{ $room }}">{{ $room }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Number of Room</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select border-0" aria-label="Floating label select example" name="washroom_no" onchange="postBarSearch()">
                            <option value="">-Select-</option>
                            @foreach(range(1, 10) as $room)
                                <option value="{{ $room }}">{{ $room }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Number of Washroom</label>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
