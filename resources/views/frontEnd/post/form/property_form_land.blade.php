<div class="tab">
    <div class="col-md-8 m-auto">
        <div class="post-ad-place">
            <h4>Tell Us About Your Property</h4>
            <input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="formGroupExampleInput" name="size" value="{{ $postDetail->size ?? "" }}" placeholder="Size (Square Meter)">
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
