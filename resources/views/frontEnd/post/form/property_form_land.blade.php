<input type="hidden" name="post_detail_id" value="{{ $postDetail->id ?? "" }}">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (App::getLocale() == 'en') ? "active" : "" }}" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="true">
            English
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (App::getLocale() == 'ar') ? "active" : "" }}" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#arabic" type="button" role="tab" aria-controls="arabic" aria-selected="false">
            Arabic
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ (App::getLocale() == 'so') ? "active" : "" }}" id="somali-tab" data-bs-toggle="tab" data-bs-target="#somali" type="button" role="tab" aria-controls="somali" aria-selected="false">
            Somali
        </button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade {{ (App::getLocale() == 'en') ? "show active" : "" }}" id="english" role="tabpanel" aria-labelledby="english-tab">
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
                <input type="text" class="form-control {{ isEvent('en') }}" id="size_en" name="size_en" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('en') }}>
            </div>

        </div>
    </div>

    <div class="tab-pane fade {{ (App::getLocale() == 'ar') ? "show active" : "" }}" id="arabic" role="tabpanel" aria-labelledby="arabic-tab">
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
                <input type="text" class="form-control {{ isEvent('ar') }}" id="size_ar" name="size_ar" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('ar') }}>
            </div>

        </div>
    </div>
    <div class="tab-pane fade {{ (App::getLocale() == 'so') ? "show active" : "" }}" id="somali" role="tabpanel" aria-labelledby="somali-tab">
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
                <input type="text" class="form-control {{ isEvent('so') }}" id="size_so" name="size_so" value="{{ $postDetail->size ?? "" }}" placeholder="{{ __('post.size') }} ({{ __('post.square_meter') }})" {{ isDisable('so') }}>
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



