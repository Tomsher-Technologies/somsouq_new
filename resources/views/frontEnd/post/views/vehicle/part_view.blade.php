<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.parts_type') }}</span> <span>{{ getTranslation($postDetail->auto_part_name) }} </li>
        <li><span>{{ __('post.brand_make_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.model_year') }}</span> <span>{{ $postDetail->model_year ?? "" }} </li>
        <li><span>{{ __('post.model') }}</span> <span>{{ $postDetail->model_number ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.color') }}</span> <span>{{ getTranslation($postDetail->color_name) }} </li>
        <li><span>{{ __('post.transmission') }}</span> <span>{{ $postDetail->exchangeable ?? "" }} </li>
    </ul>

    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->usage_condition ? ucwords($postDetail->usage_condition) : "" }} </li>
    </ul>
</div>
