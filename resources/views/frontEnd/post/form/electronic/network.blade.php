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
                <input type="number" class="form-control number {{ isEvent('so') }}" id="price_so" placeholder="{{ __('post.price') }}" name="price_so" value="{{ $postDetail->price ?? "" }}" {{ isDisable('so') }} {{ isRequired('so') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_so">
                    {{ !empty($postDetail) ? $postDetail->getTranslation('title', 'so') : "" }}
                </textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="brand_so" name="brand_so" {{ isDisable('so') }}>
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
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="type_so" name="type_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.type') }}</option>
                    @foreach($types as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->type_id ?? "")>{{ $type->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'so') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('so') }}" id="model_so" name="model_so" placeholder="{{ __('post.model') }}" value="{{ $postDetail->model ?? "" }}" {{ isDisable('so') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="color_so" name="color_so" {{ isDisable('so') }}>
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
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="condition_so" name="condition_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($conditions as $key => $condition)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->condition ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{ $key }}">{{ $condition }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="warranty_so" name="warranty_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.warranty') }}</option>
                    <option value="yes" {{ !empty($postDetail) ? ($postDetail->warranty == "yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="no" {{ !empty($postDetail) ? ($postDetail->warranty == "no") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="brand_en" name="brand_en" {{ isDisable('en') }}>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="type_en" name="type_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.type') }}</option>
                    @foreach($types as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->type_id ?? "")>{{ $type->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('en') }}" id="model_en" name="model_en" placeholder="{{ __('post.model') }}" value="{{ $postDetail->model ?? "" }}" {{ isDisable('en') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="color_en" name="color_en" {{ isDisable('en') }}>
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
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="condition_en" name="condition_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($conditions as $key => $condition)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->condition ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{ $key }}">{{ $condition }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="warranty_en" name="warranty_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.warranty') }}</option>
                    <option value="yes" {{ !empty($postDetail) ? ($postDetail->warranty == "yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="no" {{ !empty($postDetail) ? ($postDetail->warranty == "no") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
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
                <input type="number" class="form-control number {{ isEvent('ar') }}" id="price_ar" placeholder="{{ __('post.price') }}" name="price_ar" value="{{ $postDetail->price ?? "" }}" {{ isDisable('ar') }} {{ isRequired('ar') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_ar">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'ar') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="brand_ar" name="brand_ar" {{ isDisable('ar') }}>
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
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="type_ar" name="type_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.type') }}</option>
                    @foreach($types as $type)
                        @if($postDetail)
                            <option value="{{ $type->id }}" @selected($type->id == $postDetail->type_id ?? "")>{{ $type->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->getTranslation('name', 'ar') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control {{ isEvent('ar') }}" id="model_ar" name="model_ar" placeholder="{{ __('post.model') }}" value="{{ $postDetail->model ?? "" }}" {{ isDisable('ar') }}>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="color_ar" name="color_ar" {{ isDisable('ar') }}>
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
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="condition_ar" name="condition_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach($conditions as $key => $condition)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->condition ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{ $key }}">{{ $condition }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="warranty_ar" name="warranty_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.warranty') }}</option>
                    <option value="yes" {{ !empty($postDetail) ? ($postDetail->warranty == "yes") ? "selected" : '' : '' }}>{{ __('post.yes') }}</option>
                    <option value="no" {{ !empty($postDetail) ? ($postDetail->warranty == "no") ? "selected" : '' : '' }}>{{ __('post.no') }}</option>
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



