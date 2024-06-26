<?php

namespace App\Libraries;

use App\Models\Upload;

class CommonFunction
{
    public static function showPostImage(int $postId): string
    {
        $getAsset = Upload::where('post_id', $postId)->first(['external_link', 'file_name']);

        if ($getAsset) {
            return $getAsset->external_link == null ? storage_asset($getAsset->file_name) : $getAsset->external_link;
        }

        return app('url')->asset('assets/img/placeholder.jpg');
    }

    public static function showPostImageByFileName(string $fileName, ? string $externalLink = null): string
    {
        if ($fileName) {
            return $externalLink == null ? app('url')->asset('storage/' . $fileName) : $externalLink;
        }

        return app('url')->asset('assets/img/placeholder.jpg');
    }
}
