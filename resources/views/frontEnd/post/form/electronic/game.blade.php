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
                <input type="text" class="form-control" id="game_name_so" name="game_name_so" placeholder="{{ __('post.game_name') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('game_name', 'so') : "" }}">
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="genre_so" name="genre_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.genre') }}</option>
                    @foreach($genres as $genre)
                        @if($postDetail)
                            <option value="{{ $genre->id }}" @selected($genre->id == $postDetail->genre_id ?? "")>{{ $genre->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $genre->id }}">{{ $genre->getTranslation('name', 'so') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('so') }}" aria-label="Default select example" id="platform_so" name="platform_so" {{ isDisable('so') }}>
                    <option value="">{{ __('post.platform') }}</option>
                    @foreach($platforms as $platform)
                        @if($postDetail)
                            <option value="{{ $platform->id }}" @selected($platform->id == $postDetail->platform_id ?? "")>{{ $platform->getTranslation('name', 'so') }}</option>
                        @else
                            <option value="{{ $platform->id }}">{{ $platform->getTranslation('name', 'so') }}</option>
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
                <input type="text" class="form-control" id="game_name_en" name="game_name_en" placeholder="{{ __('post.game_name') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('game_name', 'en') : "" }}">
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="genre_en" name="genre_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.genre') }}</option>
                    @foreach($genres as $genre)
                        @if($postDetail)
                            <option value="{{ $genre->id }}" @selected($genre->id == $postDetail->genre_id ?? "")>{{ $genre->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $genre->id }}">{{ $genre->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="platform_en" name="platform_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.platform') }}</option>
                    @foreach($platforms as $platform)
                        @if($postDetail)
                            <option value="{{ $platform->id }}" @selected($platform->id == $postDetail->platform_id ?? "")>{{ $platform->getTranslation('name', 'en') }}</option>
                        @else
                            <option value="{{ $platform->id }}">{{ $platform->getTranslation('name', 'en') }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('en') }}" aria-label="Default select example" id="condition_en" name="condition_en" {{ isDisable('en') }}>
                    <option value="">{{ __('post.condition') }}</option>
                    @foreach(array_splice($conditions, 0, 2) as $key => $condition)
                        @if($postDetail)
                            <option value="{{ $key }}" @selected($key == $postDetail->condition ?? "")>{{ $condition }}</option>
                        @else
                            <option value="{{ $key }}">{{ $condition }}</option>
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
                <input type="number" class="form-control number {{ isEvent('ar') }}" id="price_ar" placeholder="{{ __('post.price') }}" name="price_ar" value="{{ $postDetail->price ?? "" }}" {{ isDisable('ar') }} {{ isRequired('ar') }}>
            </div>
            <div class="col-md-12">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ __('post.description') }}" name="description_ar">{{ !empty($postDetail) ? $postDetail->getTranslation('description', 'ar') : "" }}</textarea>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control" id="game_name_ar" name="game_name_ar" placeholder="{{ __('post.game_name') }}" value="{{ !empty($postDetail) ? $postDetail->getTranslation('game_name', 'ar') : "" }}">
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="genre_ar" name="genre_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.genre') }}</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->getTranslation('name', 'ar') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-select {{ isEvent('ar') }}" aria-label="Default select example" id="platform_ar" name="platform_ar" {{ isDisable('ar') }}>
                    <option value="">{{ __('post.platform') }}</option>
                    @foreach($platforms as $platform)
                        @if($postDetail)
                            <option value="{{ $platform->id }}" @selected($platform->id == $postDetail->platform_id ?? "")>{{ $platform->getTranslation('name', 'ar') }}</option>
                        @else
                            <option value="{{ $platform->id }}">{{ $platform->getTranslation('name', 'ar') }}</option>
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



