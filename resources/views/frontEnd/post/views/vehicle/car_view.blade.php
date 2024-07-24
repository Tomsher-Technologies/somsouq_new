<div class="ad-detail-spec">
    @if($sub_category_id == 19)
    <ul>
        <li><span>{{ __('post.price_per_day') }}</span> <span>{{ $postDetail->price ?? "" }} </li>
        <li><span>{{ __('post.price_per_month') }}</span> <span>{{ $postDetail->price_per_month ?? "" }} </li>
    </ul>
    @endif
    <ul>
        <li><span>{{ __('post.brand_make_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }} </li>
        <li><span>{{ __('post.model_year') }}</span> <span>{{ $postDetail->model_year ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.model') }}Model</span> <span>{{ $postDetail->model_number ?? "" }} </li>
        <li><span>{{ __('post.kilometers') }}</span> <span>{{ $postDetail->km ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.color') }}</span> <span>{{ getTranslation($postDetail->color_name) }} </li>
        <li><span>{{ __('post.fuel_type') }}</span> <span>{{ $postDetail->fuel_type ? ucwords($postDetail->fuel_type) : "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.transmission') }}</span> <span>{{ \App\Enums\Front\Transmissions::getTransmission()[$postDetail->transmission] ?? "" }} </li>
        <li><span>{{ __('post.body_type') }}</span> <span>{{ getTranslation($postDetail->body_type_name) }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.driver_side') }}</span> <span>{{ $postDetail->driver_side ? ucfirst($postDetail->driver_side) : "" }} </li>
        <li><span>{{ __('post.seats') }}</span> <span>{{ $postDetail->seat ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.engine_capacity') }}</span> <span>{{ $postDetail->engine_capacity ? $postDetail->engine_capacity . 'cc' : "" }} </li>
        <li><span>{{ __('post.engine_power') }}</span> <span>{{ $postDetail->engine_power ? $postDetail->engine_power.'hp' : "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.cylinder') }}</span> <span>{{ $postDetail->cylinder ?? "" }} </li>
        @if($sub_category_id == 26)
        <li><span>{{ __('post.exchangeable') }}</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
        @endif
    </ul>
    @if($sub_category_id == 26)
    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
    @endif
</div>
