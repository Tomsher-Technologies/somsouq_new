<div class="post-ad-place" >
    <h4>Tell Us About Your Auto Parts</h4>
    <input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">

    <div class="row g-3">
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="auto_part_type_id">
                <option value="">Select Part Type</option>
                @foreach($autoPartTypes as $key => $part)
                    @if($postDetail)
                        <option value="{{ $key }}" @selected($key == $postDetail->auto_part_type_id ?? "")>{{ $part }}</option>
                    @else
                        <option value="{{ $key }}">{{ $part }}</option>
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
                        <option value="{{ $year }}" @selected($year == $postDetail->model_year ?? "")>{{ $year }}</option>
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
            <select class="form-select" aria-label="Default select example" name="exchangeable">
                <option value="">Exchangeable</option>
                <option value="Yes" {{ ($postDetail->exchangeable ?? "" == "Yes") ? "selected" : "" }}>Yes</option>
                <option value="No" {{ ($postDetail->exchangeable ?? "" == "No") ? "selected" : "" }}>No</option>
            </select>
        </div>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="usage_condition">
                <option value="">Condition</option>
                <option value="new" {{ ($postDetail->usage_condition ?? "" == "new") ? "selected" : "" }}>New</option>
                <option value="refurbished" {{ ($postDetail->usage_condition ?? "" == "refurbished") ? "selected" : "" }}>Refurbished</option>
                <option value="used" {{ ($postDetail->usage_condition ?? "" == "used") ? "selected" : "" }}>Used</option>
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
        </div>
    </div>
</div>

