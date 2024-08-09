<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.brand_name') }}</span> <span>{{ getTranslation($postDetail->brand_name) }}</span> </li>
        <li><span>{{ __('post.model') }}</span> <span>{{ $postDetail->model ?? "" }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.screen_size') }}</span> <span>{{ $postDetail->screen_size ?? "" }}</li>
        <li><span>{{ __('post.display_technology') }}</span> <span>{{ $postDetail->display_technology ?? "" }}</span> </li>
    </ul>
    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span> </li>
        <li><span>{{ __('post.warranty') }}</span> <span>{{ $postDetail->warranty ? trans('post.'.$postDetail->warranty) : "" }}</li>
    </ul>
</div>

