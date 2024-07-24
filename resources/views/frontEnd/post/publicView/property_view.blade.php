<div class="row mt-5">
    <div class="col-md-12">
        <h4 class="mb-3">{{ __('post.item_overview') }}</h4>
        <div class="item-overview">
            <div class="card border-0">
                <div class="card-body p-0">
                    <ul>
                        <li>
                            <h4>{{ $postDetail->number_of_room ?? "" }}</h4>
                            <h5>{{ __('post.room') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->number_of_washroom ?? "" }}</h4>
                            <h5>{{ __('post.washroom') }}</h5>
                        </li>
                        <li>
                            <h4>{{ \App\Enums\Front\FurnitureStatus::getFurnitureStatus()[$postDetail->furniture_status] ?? "" }}</h4>
                            <h5>{{ __('post.furniture_status') }}</h5>
                        </li>
                        <li>
                            <h4>{{ $postDetail->elevator ?? "" }}</h4>
                            <h5>{{ __('post.elevator') }}</h5>
                        </li>
                        <li>
                            <h4>{{ \App\Enums\Front\ConditionStatus::getConditionStatus()[$postDetail->condition_status] ?? "" }}</h4>
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
                        <li><strong>{{ __('post.size') }}: </strong> <span>{{ $postDetail->size ?? "" }} <sub>M</sub> 2</span></li>
                        <li><strong>{{ __('post.age_of_building') }}:</strong> <span>{{ $postDetail->age_of_building ?? "" }}</span></li>
                        <li><strong>{{ __('post.number_of_room') }}:</strong> <span>{{ $postDetail->number_of_room ?? "" }}</span></li>
                        <li><strong>{{ __('post.number_of_washroom') }}:</strong> <span>{{ $postDetail->number_of_washroom ?? "" }}</span></li>
                        <li><strong>{{ __('post.number_of_flor') }}:</strong> <span>{{ $postDetail->number_of_floor ?? "" }}</span></li>
                        <li><strong>{{ __('post.flor_number') }}:</strong> <span>{{ $postDetail->floor_number ?? "" }}</span></li>
                        <li><strong>{{ __('post.furniture_status') }}:</strong> <span>{{ \App\Enums\Front\FurnitureStatus::getFurnitureStatus()[$postDetail->furniture_status] ?? "" }}</span></li>
                        <li><strong>{{ __('post.elevator') }}:</strong> <span>{{ $postDetail->elevator ?? "" }}</span></li>
                        <li><strong>{{ __('post.usage_of_status') }}:</strong> <span>{{ $postDetail->usage_status ?? "" }}</span></li>
                        <li><strong>{{ __('post.condition') }}:</strong> <span>{{ \App\Enums\Front\ConditionStatus::getConditionStatus()[$postDetail->condition_status] ?? "" }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
