<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.brand_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }}</span> </li>
        <li><span>{{ __('post.type') }}</span> <span>{{ getTranslation($postDetail->type_name) }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.model') }}</span> <span>{{ $postDetail->model ?? "" }}</li>
        <li><span>{{ __('post.color') }}</span> <span>{{ getTranslation($postDetail->color_name) }}</span> </li>
    </ul>
    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span> </li>
        <li><span>{{ __('post.warranty') }}</span> <span>{{ $postDetail->warranty ? trans('post.'.$postDetail->warranty) : "" }}</li>
    </ul>
</div>
