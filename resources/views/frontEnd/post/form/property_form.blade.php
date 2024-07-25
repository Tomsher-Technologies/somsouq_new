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
                <input type="text" class="form-control" id="title_ar" name="title_so" placeholder="{{ __('post.ad_title') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}" {{ isRequired('so') }}>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control number {{ isEvent('so') }}" id="price_so" placeholder="{{ __('post.price') }}" name="price_so" {{ isDisable('so') }} {{ isRequired('so') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_so">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'so') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="size_so" name="size_so" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="age_of_building_so" name="age_of_building_so" value="{{ $postDetail->age_of_building ?? "" }}" placeholder="{{ __('post.age_of_building') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="number_of_room_So" name="number_of_room_So" value="{{ $postDetail->number_of_room ?? "" }}" placeholder="{{ __('post.number_of_room') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="number_of_washroom_so" name="number_of_washroom_so" value="{{ $postDetail->number_of_washroom ?? "" }}" placeholder="{{ __('post.number_of_washroom') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="number_of_floor_so" name="number_of_floor_so" value="{{ $postDetail->number_of_floor ?? "" }}" placeholder="{{ __('post.number_of_flor') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="floor_number_So" name="floor_number_So" value="{{ $postDetail->floor_number ?? "" }}" placeholder="{{ __('post.flor_number') }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="furniture_status_so" name="furniture_status_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.furniture_status') }}</option>
                    @foreach($furniture_status as $key => $status)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->furniture_status ?? "")>{{ $status }}</option>
                        @else
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="elevator_so" name="elevator_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.elevator') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->elevator == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->elevator == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="usage_status_so" name="usage_status_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.usage_of_status') }}</option>
                    <option value="Empty" {{ !empty($postDetail) ? ($postDetail->usage_status == "Empty") ? "selected" : '' : '' }}>{{ __('post.empty') }}</option>
                    <option value="Tenant" {{ !empty($postDetail) ? ($postDetail->usage_status == "Tenant") ? "selected" : '' : '' }}>{{ __('post.tenant') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="condition_status_so" name="condition_status_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($condition_status as $key => $condition)
                        @if($postDetail)
                            <option value="{{$key}}" @selected($key == $postDetail->condition_status ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{$key}}">{{ $condition }}</option>
                        @endif
                    @endforeach
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
                <input type="number" class="form-control number {{ isEvent('en') }}" id="price_en" placeholder="{{ __('post.price') }}" name="price_en" {{ isRequired('en') }} {{ isDisable('en') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_en">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'en') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="size_en" name="size_en" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="age_of_building_en" name="age_of_building_en" value="{{ $postDetail->age_of_building ?? "" }}" placeholder="{{ __('post.age_of_building') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="number_of_room_en" name="number_of_room_en" value="{{ $postDetail->number_of_room ?? "" }}" placeholder="{{ __('post.number_of_room') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="number_of_washroom_en" name="number_of_washroom_en" value="{{ $postDetail->number_of_washroom ?? "" }}" placeholder="{{ __('post.number_of_washroom') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="number_of_floor_en" name="number_of_floor_en" value="{{ $postDetail->number_of_floor ?? "" }}" placeholder="{{ __('post.number_of_flor') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="floor_number_en" name="floor_number_en" value="{{ $postDetail->floor_number ?? "" }}" placeholder="{{ __('post.flor_number') }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="furniture_status_en" name="furniture_status_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.furniture_status') }}</option>
                    @foreach($furniture_status as $key => $status)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->furniture_status ?? "")>{{ $status }}</option>
                        @else
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="elevator_en" name="elevator_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.elevator') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->elevator == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->elevator == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="usage_status_en" name="usage_status_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.usage_of_status') }}</option>
                    <option value="Empty" {{ !empty($postDetail) ? ($postDetail->usage_status == "Empty") ? "selected" : '' : '' }}>{{ __('post.empty') }}</option>
                    <option value="Tenant" {{ !empty($postDetail) ? ($postDetail->usage_status == "Tenant") ? "selected" : '' : '' }}>{{ __('post.tenant') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="condition_status_en" name="condition_status_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($condition_status as $key => $condition)
                        @if($postDetail)
                            <option value="{{$key}}" @selected($key == $postDetail->condition_status ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{$key}}">{{ $condition }}</option>
                        @endif
                    @endforeach
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
                <input type="number" class="form-control number {{ isEvent('ar') }}" id="price_ar" placeholder="{{ __('post.price') }}" name="price_ar" {{ isDisable('ar') }} {{ isRequired('ar') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_ar">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'ar') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="size_ar" name="size_ar" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="age_of_building_ar" name="age_of_building_ar" value="{{ $postDetail->age_of_building ?? "" }}" placeholder="{{ __('post.age_of_building') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="number_of_room_ar" name="number_of_room_ar" value="{{ $postDetail->number_of_room ?? "" }}" placeholder="{{ __('post.number_of_room') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="number_of_washroom_ar" name="number_of_washroom_ar" value="{{ $postDetail->number_of_washroom ?? "" }}" placeholder="{{ __('post.number_of_washroom') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="number_of_floor_ar" name="number_of_floor_ar" value="{{ $postDetail->number_of_floor ?? "" }}" placeholder="{{ __('post.number_of_flor') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="floor_number_ar" name="floor_number_ar" value="{{ $postDetail->floor_number ?? "" }}" placeholder="{{ __('post.flor_number') }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="furniture_status_ar" name="furniture_status_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.furniture_status') }}</option>
                    @foreach($furniture_status as $key => $status)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->furniture_status ?? "")>{{ $status }}</option>
                        @else
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="elevator_ar" name="elevator_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.elevator') }}</option>
                    <option value="Yes" {{ !empty($postDetail) ? ($postDetail->elevator == "Yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="No" {{ !empty($postDetail) ? ($postDetail->elevator == "No") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="usage_status_ar" name="usage_status_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.usage_of_status') }}</option>
                    <option value="Empty" {{ !empty($postDetail) ? ($postDetail->usage_status == "Empty") ? "selected" : '' : '' }}>{{ __('post.empty') }}</option>
                    <option value="Tenant" {{ !empty($postDetail) ? ($postDetail->usage_status == "Tenant") ? "selected" : '' : '' }}>{{ __('post.tenant') }}</option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="condition_status_ar" name="condition_status_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($condition_status as $key => $condition)
                        @if($postDetail)
                            <option value="{{$key}}" @selected($key == $postDetail->condition_status ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{$key}}">{{ $condition }}</option>
                        @endif
                    @endforeach
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


