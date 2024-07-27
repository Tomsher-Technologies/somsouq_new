
<input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (getLocaleLang() == 'so') ? "active" : "" }}" id="somali-tab" data-bs-toggle="tab" data-bs-target="#somali" type="button" role="tab" aria-controls="somali" aria-selected="false">
            Somali
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (getLocaleLang() == 'en') ? "active" : "" }}" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="true">
            English
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (getLocaleLang() == 'ar') ? "active" : "" }}" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#arabic" type="button" role="tab" aria-controls="arabic" aria-selected="false">
            Arabic
        </button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade {{ (getLocaleLang() == 'so') ? "show active" : "" }}" id="somali" role="tabpanel" aria-labelledby="somali-tab">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="title_so" name="title_so" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}" {{ isRequired('so') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('so') }}" id="price_so" placeholder="{{ __('post.price') }}" name="price_so" value="{{ $postDetail->price ?? "" }}" {{ isRequired('so') }} {{ isDisable('so') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_so">
                    {{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}
                </textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="auto_part_type_id_so" id="auto_part_type_id_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.parts_type') }}</option>
                    @foreach($autoPartTypes as $part)
                        @if($postDetail)
                            <option value="{{ $part->id }}" @selected($part->id == $postDetail->auto_part_type_id ?? "")>{{ $part->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $part->id }}">{{ $part->getTranslation('name', 'so') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="brand_id_so" id="brand_id_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.brand_make') }}</option>
                    @foreach($brands as $brand)
                        @if($postDetail)
                            <option value="{{ $brand->id }}" @selected($brand->id == $postDetail->brand_id ?? "")>{{ $brand->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $brand->id }}">{{ $brand->getTranslation('name', 'so') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="model_year_so" id="model_year_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.model_year') }}</option>
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
                <input type="text" class="form-control {{ isEvent('so') }}" id="model_number_so" name="model_number_so" placeholder="{{ __('post.model') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="color_id_so" id="color_id_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.color') }}</option>
                    @foreach($colors as $color)
                        @if($postDetail)
                            <option value="{{ $color->id }}" @selected($color->id == $postDetail->color_id ?? "")>{{ $color->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $color->id }}">{{ $color->getTranslation('name', 'so') }}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="exchangeable_so" id="exchangeable_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.exchangeable') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->exchangeable == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->exchangeable == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="usage_condition_so" id="usage_condition_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="refurbished" {{ !empty($postDetail) ? ($postDetail->usage_condition == "refurbished") ? "selected" : '' : '' }}>{{ __('post.refurbished') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                </select>
            </div>

        </div>
    </div>

    <div class="tab-pane fade {{ (getLocaleLang() == 'en') ? "show active" : "" }}" id="english" role="tabpanel" aria-labelledby="english-tab">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="formGroupExampleInput" name="title_en" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'en') : "" }}" {{ isRequired('en') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('en') }}" id="price_en" placeholder="{{ __('post.price') }}" name="price_en" value="{{ $postDetail->price ?? "" }}" {{ isRequired('en') }} {{ isDisable('en') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_en">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'en') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="auto_part_type_id_en" id="auto_part_type_id_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.parts_type') }}</option>
                    @foreach($autoPartTypes as $part)
                        @if($postDetail)
                            <option value="{{ $part->id }}" @selected($part->id == $postDetail->auto_part_type_id ?? "")>{{ $part->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $part->id }}">{{ $part->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="brand_id_en" id="brand_id_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.brand_make') }}</option>
                    @foreach($brands as $brand)
                        @if($postDetail)
                            <option value="{{ $brand->id }}" @selected($brand->id == $postDetail->brand_id ?? "")>{{ $brand->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $brand->id }}">{{ $brand->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="model_year_en" id="model_year_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.model_year') }}</option>
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
                <input type="text" class="form-control {{ isEvent('en') }}" id="model_number_en" name="model_number_en" placeholder="{{ __('post.model') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="color_id_en" id="color_id_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.color') }}</option>
                    @foreach($colors as $color)
                        @if($postDetail)
                            <option value="{{ $color->id }}" @selected($color->id == $postDetail->color_id ?? "")>{{ $color->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $color->id }}">{{ $color->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="exchangeable_en" id="exchangeable_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.exchangeable') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->exchangeable == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->exchangeable == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="usage_condition_en" id="usage_condition_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="refurbished" {{ !empty($postDetail) ? ($postDetail->usage_condition == "refurbished") ? "selected" : '' : '' }}>{{ __('post.refurbished') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                </select>
            </div>

        </div>
    </div>

    <div class="tab-pane fade {{ (getLocaleLang() == 'ar') ? "show active" : "" }}" id="arabic" role="tabpanel" aria-labelledby="arabic-tab">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'ar') : "" }}" {{ isRequired('ar') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('ar') }}" id="price_ar" placeholder="{{ __('post.price') }}" name="price_ar" value="{{ $postDetail->price ?? "" }}" {{ isRequired('ar') }} {{ isDisable('ar') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_ar">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'ar') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="auto_part_type_id_ar" id="auto_part_type_id_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.parts_type') }}</option>
                    @foreach($autoPartTypes as $part)
                        @if($postDetail)
                            <option value="{{ $part->id }}" @selected($part->id == $postDetail->auto_part_type_id ?? "")>{{ $part->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $part->id }}">{{ $part->getTranslation('name', 'ar') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="brand_id_ar" id="brand_id_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.brand_make') }}</option>
                    @foreach($brands as $brand)
                        @if($postDetail)
                            <option value="{{ $brand->id }}" @selected($brand->id == $postDetail->brand_id ?? "")>{{ $brand->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $brand->id }}">{{ $brand->getTranslation('name', 'ar') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="model_year_ar" id="model_year_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.model_year') }}</option>
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
                <input type="text" class="form-control {{ isEvent('ar') }}" id="model_number_ar" name="model_number_ar" placeholder="{{ __('post.model') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="color_id_ar" id="color_id_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.color') }}</option>
                    @foreach($colors as $color)
                        @if($postDetail)
                            <option value="{{ $color->id }}" @selected($color->id == $postDetail->color_id ?? "")>{{ $color->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $color->id }}">{{ $color->getTranslation('name', 'ar') }}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="exchangeable_ar" id="exchangeable_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.exchangeable') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->exchangeable == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->exchangeable == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="usage_condition_ar" id="usage_condition_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="refurbished" {{ !empty($postDetail) ? ($postDetail->usage_condition == "refurbished") ? "selected" : '' : '' }}>{{ __('post.refurbished') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                </select>
            </div>

        </div>
    </div>
</div>

<div class="promote-ad">
    <h4>{{ __('post.promote_ad') }}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="promote-ad-inner">
                <!-- <span>Trail for free</span> -->
                <a href="#" class="btn btn-promote">{{ __('post.free') }} <i class="bi bi-check2"></i></a>
            </div>
        </div>
    </div>
</div>

