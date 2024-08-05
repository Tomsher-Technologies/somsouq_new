<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">{{ __('post.item_overview') }}</h4>
        <div class="item-overview">
            <div class="card border-0">
                <div class="card-body p-0">
                    <ul>
                        <li>
                            <h4>{{ ucwords(getTranslation($postDetail->brand_name)) }}</h4>
                            <h5>{{ __('post.brand_name') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->type_name) }}</h4>
                            <h5>{{ __('post.shoes_type') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->size ?? "" }}</h4>
                            <h5>{{ __('post.size') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->material_name) }}</h4>
                            <h5>{{ __('post.material') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->color_name) }}</h4>
                            <h5>{{ __('post.color') }}</h5>
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
                        <li><strong>{{ __('post.brand_name') }}: </strong> <span>{{ ucwords(getTranslation($postDetail->brand_name)) }}</span></li>
                        <li><strong>{{ __('post.shoes_type') }}:</strong> <span>{{ getTranslation($postDetail->type_name) }}</span></li>
                        <li><strong>{{ __('post.size') }}:</strong> <span>{{ $postDetail->size ?? "" }}</span></li>
                        <li><strong>{{ __('post.material') }}:</strong> <span>{{ getTranslation($postDetail->material_name) }}</span></li>
                        <li><strong>{{ __('post.gender') }}:</strong> <span>{{ $postDetail->gender ? ucfirst($postDetail->gender) : "" }}</span></li>
                        <li><strong>{{ __('post.color') }}</strong> <span>{{ getTranslation($postDetail->color_name) }}</span></li>
                        <li><strong>{{ __('post.occasion') }}:</strong> <span>{{ getTranslation($postDetail->occasion_name) }}</span></li>
                        <li><strong>{{ __('post.condition') }}:</strong> <span>{{ $postDetail->condition ? ucfirst($postDetail->condition) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

