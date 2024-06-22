<div class="tab">
    <div class="col-md-8 m-auto">
        <div class="post-ad-place" >
            <h4>Tell Us About Your Property</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="size" placeholder="Size (Square Meter)">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="age_of_building" placeholder="Age Of Building">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="number_of_room" placeholder="Number Of Rooms">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="number_of_washroom" placeholder="Number Of Washrooms">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="number_of_floor" placeholder="Number Of Floor">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="floor_number" placeholder="Floor Number">
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="furniture_status">
                        <option value="">Furniture Status</option>
                        @foreach($furniture_status as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="elevator">
                        <option value="">Elevator</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="usage_status">
                        <option value="">Usage Of Status</option>
                        <option value="Empty">Empty</option>
                        <option value="Tenant">Tenant</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="condition_status">
                        <option value="">Condition</option>
                        @foreach($condition_status as $key => $condition)
                            <option value="{{$key}}">{{ $condition }}</option>
                        @endforeach
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

