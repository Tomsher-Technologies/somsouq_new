
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
                <input type="text" class="form-control" id="formGroupExampleInput" name="title_so" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}" {{ isRequired('so') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('so') }}" id="price_so" placeholder="{{ __('post.price') }}" name="price_so" value="{{ $postDetail->price ?? "" }}" {{ isDisable('so') }} {{ isRequired('so') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_so">
                    {{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}
                </textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="boat_type_id_so" id="boat_type_id_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.boat_type') }}</option>
                    @foreach($boatTypes as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->boat_type_id ?? "")>{{ $type->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'so') }}</option>
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
                            <option value="{{ $year }}" @selected($key == $postDetail->model_year ?? "")>{{ $year }}</option>
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
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="fuel_type_so" id="fuel_type_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.fuel_type') }}</option>
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
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="transmission_so" id="transmission_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.transmission') }}</option>
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
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" name="usage_condition_so" id="usage_condition_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                    <option value="foreign used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "foreign used") ? "selected" : '' : '' }}>{{ __('post.foreign_used') }}</option>
                    <option value="not working" {{ !empty($postDetail) ? ($postDetail->usage_condition == "not working") ? "selected" : '' : '' }}>{{ __('post.not_working') }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="tab-pane fade {{ (getLocaleLang() == 'en') ? "show active" : "" }}" id="english" role="tabpanel" aria-labelledby="english-tab">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="title_en" name="title_en" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'en') : "" }}" {{ isRequired('en') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('en') }}" id="price_en" placeholder="{{ __('post.price') }}" name="price_en" value="{{ $postDetail->price ?? "" }}" {{ isRequired('en') }} {{ isDisable('en') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_en">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'en') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="boat_type_id_en" id="boat_type_id_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.boat_type') }}</option>
                    @foreach($boatTypes as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->boat_type_id ?? "")>{{ $type->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'en') }}</option>
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
                            <option value="{{ $year }}" @selected($key == $postDetail->model_year ?? "")>{{ $year }}</option>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="fuel_type_en" id="fuel_type_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.fuel_type') }}</option>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="transmission_en" id="transmission_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.transmission') }}</option>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" name="usage_condition_en" id="usage_condition_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                    <option value="foreign used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "foreign used") ? "selected" : '' : '' }}>{{ __('post.foreign_used') }}</option>
                    <option value="not working" {{ !empty($postDetail) ? ($postDetail->usage_condition == "not working") ? "selected" : '' : '' }}>{{ __('post.not_working') }}</option>
                </select>
            </div>

        </div>
    </div>

    <div class="tab-pane fade {{ (getLocaleLang() == 'ar') ? "show active" : "" }}" id="arabic" role="tabpanel" aria-labelledby="arabic-tab">
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="formGroupExampleInput" name="title_ar" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'ar') : "" }}" {{ isRequired('ar') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('ar') }}" id="price_ar" placeholder="{{ __('post.price') }}" name="price_ar" value="{{ $postDetail->price ?? "" }}" {{ isDisable('ar') }} {{ isRequired('ar') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_ar">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'ar') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="boat_type_id_ar" name="boat_type_id_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.boat_type') }}</option>
                    @foreach($boatTypes as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->boat_type_id ?? "")>{{ $type->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'ar') }}</option>
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
                            <option value="{{ $year }}" @selected($key == $postDetail->model_year ?? "")>{{ $year }}</option>
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
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="fuel_type_ar" id="fuel_type_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.fuel_type') }}</option>
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
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="transmission_ar" id="transmission_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.transmission') }}</option>
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
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" name="usage_condition_ar" id="usage_condition_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    <option value="new" {{ !empty($postDetail) ? ($postDetail->usage_condition == "new") ? "selected" : '' : '' }}>{{ __('post.new') }}</option>
                    <option value="used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "used") ? "selected" : '' : '' }}>{{ __('post.used') }}</option>
                    <option value="foreign used" {{ !empty($postDetail) ? ($postDetail->usage_condition == "foreign used") ? "selected" : '' : '' }}>{{ __('post.foreign_used') }}</option>
                    <option value="not working" {{ !empty($postDetail) ? ($postDetail->usage_condition == "not working") ? "selected" : '' : '' }}>{{ __('post.not_working') }}</option>
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

