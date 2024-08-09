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
        <li><span>{{ __('post.processor') }}</span> <span>{{ $postDetail->processor ?? "" }}</li>
        <li><span>{{ __('post.generation') }}</span> <span>{{ $postDetail->generation ?? "" }}</span> </li>
    </ul>
    <ul>
        <li><span>{{ __('post.ram') }}</span> <span>{{ $postDetail->ram ?? "" }}</li>
        <li><span>{{ __('post.storage_capacity') }}</span> <span>{{ $postDetail->storage_capacity ?? "" }}</span> </li>
    </ul>
    <ul>
        <li><span>{{ __('post.graphic_card') }}</span> <span>{{ $postDetail->graphic_card ?? "" }}</li>
        <li><span>{{ __('post.operating_system') }}</span> <span>{{ $postDetail->operating_system ?? "" }}</span> </li>
    </ul>
    <ul>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span> </li>
        <li><span>{{ __('post.warranty') }}</span> <span>{{ $postDetail->warranty ? trans('post.'.$postDetail->warranty) : "" }}</li>
    </ul>
</div>

