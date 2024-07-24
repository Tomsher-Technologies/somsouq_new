<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.heavy_equipment_type') }}</span> <span>{{ getTranslation($postDetail->heavy_equipment_type_name) }} </li>
        <li><span>{{ __('post.brand_make_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }} </li>

    </ul>

    <ul>
        <li><span>{{ __('post.model_year') }}</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>{{ __('post.model') }}</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.kilometers') }}</span> <span>{{ $postDetail->km ?? "" }} </li>
        <li><span>{{ __('post.color') }}</span> <span>{{ getTranslation($postDetail->color_name) }}</li>
    </ul>

    <ul>
        <li><span>{{ __('post.fuel_type') }}</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
        <li><span>{{ __('post.transmission') }}</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.engine_capacity') }}</span> <span>{{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }} </li>
        <li><span>{{ __('post.engine_power') }}</span> <span>{{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.cylinder') }}</span> <span>{{ $postDetail->cylinder ?? "" }} </li>
        <li><span>{{ __('post.capacity_weight') }}</span> <span>{{ $postDetail->carriage_capacity ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.exchangeable') }}</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
