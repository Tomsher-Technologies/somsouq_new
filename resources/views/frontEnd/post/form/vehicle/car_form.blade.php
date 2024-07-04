<div class="post-ad-place" >
    <h4>Tell Us About Your Car</h4>
    <input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">

    <div class="row g-3">
        @if($sub_category_id == 19)
            <div class="col-md-6">
                <input type="number" class="form-control" id="formGroupExampleInput" name="price_per_month" placeholder="Price per-month" value="{{ $postDetail->price_per_month ?? "" }}">
            </div>
        @endif
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="brand_id">
                <option value="">Select Brand/ Make</option>
                @foreach($brands as $key => $brand)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->brand_id ?? "")>{{ $brand }}</option>
                    @else
                        <option value="{{ $key }}">{{ $brand }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="model_year">
                <option value="">Select Model Year</option>
                @foreach($model_years as $key => $year)
                    @if($postDetail)
                        <option value="{{ $year }}" @selected($year == $postDetail->model_year ?? "")>{{ $year }}</option>
                    @else
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" id="formGroupExampleInput" name="model_number" placeholder="Model" value="{{ $postDetail->model_number ?? "" }}">
        </div>

        <div class="col-md-6">
            <input type="number" class="form-control" id="formGroupExampleInput" name="km" placeholder="Km" value="{{ $postDetail->Km ?? "" }}">
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="color_id">
                <option value="">Select Color</option>
                @foreach($colors as $key => $color)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->color_id ?? "")>{{ $color }}</option>
                    @else
                        <option value="{{ $key }}">{{ $color }}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="fuel_type">
                <option value="">Select Fuel Type</option>
                @foreach($fuel_types as $key => $fuel)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->fuel_type ?? "")>{{ $fuel }}</option>
                    @else
                        <option value="{{ $key }}">{{ $fuel }}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="transmission">
                <option value="">Select Transmission</option>
                @foreach($transmissions as $key => $transmission)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->transmission ?? "")>{{ $transmission }}</option>
                    @else
                        <option value="{{ $key }}">{{ $transmission }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="body_type_id">
                <option value="">Select Body Type</option>
                @foreach($body_types as $key => $body_type)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->body_type_id ?? "")>{{ $body_type }}</option>
                    @else
                        <option value="{{ $key }}">{{ $body_type }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="driver_side">
                <option value="">Select Driver Side</option>
                <option value="left" {{ ($postDetail->driver_side ?? "" == "left") ? "selected" : "" }}>Left</option>
                <option value="right" {{ ($postDetail->driver_side ?? "" == "right") ? "selected" : "" }}>Right</option>
            </select>
        </div>

        <div class="col-md-6">
            <input type="number" class="form-control" id="formGroupExampleInput" name="seat" placeholder="Seats" value="{{ $postDetail->seat ?? "" }}">
        </div>

        <div class="col-md-6">
            <input type="number" class="form-control" id="formGroupExampleInput" name="engine_capacity" placeholder="Engine Capacity (cc)" value="{{ $postDetail->engine_capacity ?? "" }}">
        </div>

        <div class="col-md-6">
            <input type="number" class="form-control" id="formGroupExampleInput" name="engine_power" placeholder="Engine Power (hp)" value="{{ $postDetail->engine_power ?? "" }}">
        </div>

        <div class="col-md-6">
            <input type="number" class="form-control" id="formGroupExampleInput" name="cylinder" placeholder="Cylinder" value="{{ $postDetail->cylinder ?? "" }}">
        </div>

        @if($sub_category_id == 26)
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="exchangeable">
                    <option value="">Exchangeable</option>
                    <option value="Yes" {{ ($postDetail->exchangeable ?? "" == "Yes") ? "selected" : "" }}>Yes</option>
                    <option value="No" {{ ($postDetail->exchangeable ?? "" == "No") ? "selected" : "" }}>No</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="usage_condition">
                    <option value="">Select Condition</option>
                    <option value="new" {{ ($postDetail->usage_condition ?? "" == "new") ? "selected" : "" }}>New</option>
                    <option value="local used" {{ ($postDetail->usage_condition ?? "" == "local used") ? "selected" : "" }}>Local Used</option>
                    <option value="foreign used" {{ ($postDetail->usage_condition ?? "" == "foreign used") ? "selected" : "" }}>Foreign Used</option>
                </select>
            </div>
        @endif

    </div>
    <div class="promote-ad">
        <h4>Promote Your Ad</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="promote-ad-inner">
                    <!-- <span>Trail for free</span> -->
                    <a href="#" class="btn btn-promote">Free <i class="bi bi-check2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
