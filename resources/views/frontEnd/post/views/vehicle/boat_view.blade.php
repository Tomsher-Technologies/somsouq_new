<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.boat_type') }}</span> <span>{{ getTranslation($postDetail->boat_type_name) }} </li>
        <li><span>{{ __('post.brand_make_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.model_year') }}</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>{{ __('post.model') }}</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.fuel_type') }}</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
        <li><span>{{ __('post.transmission') }}</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
