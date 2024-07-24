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
                            <h4>{{ getTranslation($postDetail->color_name) }}</h4>
                            <h5>{{ __('post.color') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->model_year ?? "" }}</h4>
                            <h5>{{ __('post.model_year') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->model_number ?? "" }}</h4>
                            <h5>{{ __('post.model') }}</h5>
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
                        <li><strong>{{ __('post.parts_type') }}:</strong> <span>{{ getTranslation($postDetail->auto_part_name) }}</span></li>
                        <li><strong>{{ __('post.brand_make_name') }}:</strong> <span>{{ getTranslation($postDetail->brand_name) }}</span></li>
                        <li><strong>{{ __('post.model_year') }}</strong> <span>{{ $postDetail->model_year ?? "" }}</span></li>
                        <li><strong>{{ __('post.model') }}</strong> <span>{{ $postDetail->model_number ?? "" }}</span></li>
                        <li><strong>{{ __('post.color') }}:</strong> <span>{{ $postDetail->color_name ?? "" }}</span></li>
                        <li><strong>{{ __('post.transmission') }}:</strong> <span>{{ $postDetail->exchangeable ?? "" }}</span></li>
                        <li><strong>{{ __('post.condition') }}:</strong> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>














