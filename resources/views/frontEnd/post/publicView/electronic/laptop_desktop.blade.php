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
                            <h5>{{ __('post.type') }}</h5>
                        </li>
                        <li>
                            <h4>{{ getTranslation($postDetail->color_name) }}</h4>
                            <h5>{{ __('post.color') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->model ?? "" }}</h4>
                            <h5>{{ __('post.model') }}</h5>
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
                        <li><strong>{{ __('post.type') }}:</strong> <span>{{ getTranslation($postDetail->type_name) }}</span></li>
                        <li><strong>{{ __('post.model') }}:</strong> <span>{{ $postDetail->model ?? "" }}</span></li>
                        <li><strong>{{ __('post.color') }}</strong> <span>{{ getTranslation($postDetail->color_name) }}</span></li>
                        <li><strong>{{ __('post.processor') }}</strong> <span>{{ $postDetail->processor ?? "" }}</span></li>
                        <li><strong>{{ __('post.generation') }}</strong> <span>{{ $postDetail->generation ?? "" }}</span></li>
                        <li><strong>{{ __('post.ram') }}</strong> <span>{{ $postDetail->ram ?? "" }}</span></li>
                        <li><strong>{{ __('post.storage_capacity') }}</strong> <span>{{ $postDetail->storage_capacity ?? "" }}</span></li>
                        <li><strong>{{ __('post.screen_size') }}</strong> <span>{{ $postDetail->screen_size ?? "" }}</span></li>
                        <li><strong>{{ __('post.graphic_card') }}</strong> <span>{{ $postDetail->graphic_card ?? "" }}</span></li>
                        <li><strong>{{ __('post.operating_system') }}</strong> <span>{{ $postDetail->operating_system ?? "" }}</span></li>
                        <li><strong>{{ __('post.condition') }}:</strong> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span></li>
                        <li class="border-0"><strong>{{ __('post.warranty') }}:</strong> <span>{{ $postDetail->warranty ? trans('post.'.$postDetail->warranty) : "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
