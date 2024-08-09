<div class="ad-detail-spec">
    <ul>
        <li><span>{{ __('post.game_name') }}</span> <span>{{ getTranslation($postDetail->game_name) }}</span> </li>
        <li><span>{{ __('post.genre') }}</span> <span>{{ getTranslation($postDetail->genre_name) }}</li>
    </ul>
    <ul>
        <li><span>{{ __('post.platform') }}</span> <span>{{ getTranslation($postDetail->platform_name) }}</li>
        <li><span>{{ __('post.condition') }}</span> <span>{{ $postDetail->condition ? trans('post.'.$postDetail->condition) : "" }}</span> </li>
    </ul>
</div>

