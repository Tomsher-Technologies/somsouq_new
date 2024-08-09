<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">{{ __('post.item_overview') }}</h4>
        <div class="item-overview">
            <div class="card border-0">
                <div class="card-body p-0">
                    <ul>
                        <li>
                            <h4>{{ getTranslation($postDetail->game_name) }}</h4>
                            <h5>{{ __('post.game_name') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->genre_name) }}</h4>
                            <h5>{{ __('post.genre') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->platform_name) }}</h4>
                            <h5>{{ __('post.platform') }}</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">{{ __('post.additional_details') }}</h4>
        <div class="additional-details">
            <div class="card product-card">
                <div class="card-body p-0">
                    <ul>
                        <li><strong>{{ __('post.game_name') }}: </strong> <span>{{ getTranslation($postDetail->game_name) }}</span></li>
                        <li><strong>{{ __('post.genre') }}:</strong> <span>{{ getTranslation($postDetail->genre_name) }}</span></li>
                        <li><strong>{{ __('post.platform') }}:</strong> <span>{{ getTranslation($postDetail->platform_name) }}</span></li>
                        <li class="border-0"><strong>{{ __('post.condition') }}:</strong> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
