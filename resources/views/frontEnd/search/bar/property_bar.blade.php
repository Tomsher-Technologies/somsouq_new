<div class="row">
    <div class="col-md-12">
        <div class="filter-box">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
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
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
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
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="">-Select-</option>
                            @foreach($price_ranges as $price)
                                <option value="{{ $price }}">{{ $price }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Price Range</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
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
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="">-Select-</option>
                            @foreach(range(1, 20) as $room)
                                <option value="{{ $room }}">{{ $room }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Number of Room</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <select class="form-select border-0" id="floatingSelect" aria-label="Floating label select example">
                            <option value="">-Select-</option>
                            @foreach(range(1, 10) as $room)
                                <option value="{{ $room }}">{{ $room }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Number of Washroom</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
