<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.Size') }}</span> <span>{{ $postDetail->size ?? "" }} <sub>M</sub> 2</span> </li>
        <li><span>{{ __('post.age_of_building') }}</span> <span>{{ $postDetail->age_of_building ?? "" }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.number_of_room') }}</span> <span>{{ $postDetail->number_of_room ?? "" }} </li>
        <li><span>{{ __('post.number_of_washroom') }}</span> <span>{{ $postDetail->number_of_washroom ?? "" }} </li>
    </ul>
    <ul>
        <li><span>{{ __('post.number_of_flor') }}</span> <span>{{ $postDetail->number_of_floor ?? "" }}</li>
        <li><span>{{ __('post.flor_number') }}</span> <span>{{ $postDetail->floor_number ?? "" }} </li>
    </ul>
    <ul>
        <li><span>{{ __('post.furniture_status') }}</span> <span>{{ \App\Enums\Front\FurnitureStatus::getFurnitureStatus()[$postDetail->furniture_status] ?? "" }} </li>
        <li><span>{{ __('post.elevator') }}</span> <span>{{ $postDetail->elevator ?? "" }} </li>
    </ul>
    <ul>
        <li><span>{{ __('post.usage_of_status') }}</span> <span>{{ $postDetail->usage_status ?? "" }} </li>
        <li><span>{{ __('post.condition') }}</span> <span>{{ \App\Enums\Front\ConditionStatus::getConditionStatus()[$postDetail->condition_status] ?? "" }} </li>
    </ul>
</div>
