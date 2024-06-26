<div class="tab">
    <div class="col-md-8 m-auto">
        <div class="post-ad-place" >
            <h4>Tell Us About Your Boats and Watercraft</h4>
            <input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">

            <div class="row g-3">
                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="boat_type_id">
                        <option value="">Select Type</option>
                        @foreach($boatTypes as $key => $type)
                            @if($postDetail)
                                <option value="{{ $key }}" @selected($key == $postDetail->boat_type_id ?? "")>{{ $type }}</option>
                            @else
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

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
                                <option value="{{ $year }}" @selected($key == $postDetail->model_year ?? "")>{{ $year }}</option>
                            @else
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="model_number" placeholder="Model">
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
                    <select class="form-select" aria-label="Default select example" name="usage_condition">
                        <option value="">Condition</option>
                        <option value="new" {{ ($postDetail->usage_condition ?? "" == "new") ? "selected" : "" }}>New</option>
                        <option value="used" {{ ($postDetail->usage_condition ?? "" == "used") ? "selected" : "" }}>Used</option>
                        <option value="foreign used" {{ ($postDetail->usage_condition ?? "" == "foreign used") ? "selected" : "" }}>Foreign Used</option>
                        <option value="not working" {{ ($postDetail->usage_condition ?? "" == "not working") ? "selected" : "" }}>Not Working</option>
                    </select>
                </div>

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
                    <!-- <div class="col-md-4">
                      <div class="promote-ad-inner">
                        <span>Top</span>
                        <a href="#" class="btn btn-promote">7 Days</a>
                        <a href="#" class="btn btn-promote">30 Days</a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="promote-ad-inner">
                        <span>Boost Premium Promo</span>
                        <a href="#" class="btn btn-promote">7 Days</a>
                      </div>
                    </div> -->
                </div>
            </div>

            <hr class="my-4">
            {{--                                <div class="text-end mt-3 d-flex align-items-center justify-content-between">--}}
            {{--                                    <a href="post-ad-details.html" class="btn btn-primary">Back</a>--}}
            {{--                                    <a href="index.html" class="btn btn-primary">Post an Ad</a>--}}
            {{--                                </div>--}}

        </div>
    </div>
</div>

