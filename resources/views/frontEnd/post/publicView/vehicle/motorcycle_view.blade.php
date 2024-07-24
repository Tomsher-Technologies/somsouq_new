<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">{{ __('post.item_overview') }}</h4>
        <div class="item-overview">
            <div class="card border-0">
                <div class="card-body p-0">
                    <ul>
                        <li>
                            <h4>{{ getTranslation($postDetail->brand_name) }}</h4>
                            <h5>{{ __('post.brand_name') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->km ?? "" }}</h4>
                            <h5>{{ __('post.kilometers') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }}</h4>
                            <h5>{{ __('post.fuel_type') }}</h5>
                        </li>
                        <li>
                            <h4>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }}</h4>
                            <h5>{{ __('post.transmission') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</h4>
                            <h5>{{ __('post.condition') }}</h5>
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
                        <li><strong>{{ __('post.brand_make_name') }}:</strong> <span>{{ getTranslation($postDetail->brand_name) }}</span></li>
                        <li><strong>{{ __('post.model_year') }}:</strong> <span>{{ $postDetail->model_year ?? "" }}</span></li>

                        <li><strong>{{ __('post.model') }}</strong> <span>{{ $postDetail->model_number ?? "" }}</span></li>
                        <li><strong>{{ __('post.kilometers') }}</strong> <span>{{ $postDetail->km ?? "" }}</span></li>

                        <li><strong>{{ __('post.color') }}:</strong> <span>{{ getTranslation($postDetail->color_name) }}</span></li>
                        <li><strong>{{ __('post.fuel_type') }}:</strong> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }}</span></li>

                        <li><strong>{{ __('post.transmission') }}:</strong> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }}</span></li>

                        <li><strong>{{ __('post.engine_capacity') }}:</strong> <span>{{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }}</span></li>
                        <li><strong>{{ __('post.engine_power') }}:</strong> <span>{{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }}</span></li>

                        <li><strong>{{ __('post.cylinder') }}:</strong> <span>{{ $postDetail->cylinder ?? "" }}</span></li>

                        <li><strong>{{ __('post.exchangeable') }}:</strong> <span>{{ $postDetail->exchangeable ?? "" }}</span></li>
                        <li><strong>{{ __('post.condition') }}:</strong> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>









