<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.brand_name') }}</span> <span>{{ ucwords(getTranslation($postDetail->brand_name)) }}</span> </li>
        <li><span>{{ __('post.watch_type') }}</span> <span>{{ getTranslation($postDetail->type_name) }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.gender') }}</span> <span>{{ $postDetail->gender ? ucfirst($postDetail->gender) : "" }}</li>
        <li><span>{{ __('post.material') }}</span> <span>{{ getTranslation($postDetail->material_name) }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.color') }}</span> <span>{{ getTranslation($postDetail->color_name) }}</span> </li>
        <li><span>{{ __('post.movement') }}</span> <span>{{ $postDetail->movement ? ucwords($postDetail->movement) : "" }}</span> </li>

    </ul>
    <ul>
        <li><span>{{ __('post.style') }}</span> <span>{{ getTranslation($postDetail->occasion_name) }}</span> </li>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->condition ? ucfirst($postDetail->condition) : "" }}</li>
    </ul>
</div>
