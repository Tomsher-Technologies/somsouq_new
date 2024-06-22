<div class="tab">
    <div class="col-md-8 m-auto">
        <div class="post-ad-place" >
            <h4>Tell Us About Your Car</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="brand_id">
                        <option value="">Select Brand/ Make</option>
                        @foreach($brands as $key => $brand)
                            <option value="{{ $key }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="model_year">
                        <option value="">Select Model Year</option>
                        @foreach($model_years as $key => $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="model_number" placeholder="Model">
                </div>

                <div class="col-md-6">
                    <input type="number" class="form-control" id="formGroupExampleInput" name="km" placeholder="Km">
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="color_id">
                        <option value="">Select Color</option>
                        @foreach($colors as $key => $color)
                            <option value="{{ $key }}">{{ $color }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="fuel_type">
                        <option value="">Select Fuel Type</option>
                        @foreach($fuel_types as $key => $fuel)
                            <option value="{{ $key }}">{{ $fuel }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="transmission">
                        <option value="">Select Transmission</option>
                        @foreach($transmissions as $key => $transmission)
                            <option value="{{ $key }}">{{ $transmission }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="body_type_id">
                        <option value="">Select Body Type</option>
                        @foreach($body_types as $key => $body_type)
                            <option value="{{ $key }}">{{ $body_type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="driver_side">
                        <option value="">Select Driver Side</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <input type="number" class="form-control" id="formGroupExampleInput" name="seat" placeholder="Seats">
                </div>

                <div class="col-md-6">
                    <input type="number" class="form-control" id="formGroupExampleInput" name="engine_capacity" placeholder="Engine Capacity (cc)">
                </div>

                <div class="col-md-6">
                    <input type="number" class="form-control" id="formGroupExampleInput" name="engine_power" placeholder="Engine Power (hp)">
                </div>

                <div class="col-md-6">
                    <input type="number" class="form-control" id="formGroupExampleInput" name="cylinder" placeholder="Cylinder">
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="exchangeable">
                        <option value="">Exchangeable</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="usage_condition">
                        <option value="">Select Condition</option>
                        <option value="new">New</option>
                        <option value="local used">Local Used</option>
                        <option value="foreign used">Foreign Used</option>
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

