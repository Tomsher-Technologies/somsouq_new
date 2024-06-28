<?php

namespace App\Libraries;

use App\Models\Category;
use App\Models\Upload;

class CommonFunction
{
    public static function showPostImage(int $postId): string
    {
        $getAsset = Upload::where('post_id', $postId)->first(['external_link', 'file_name', 'file_original_name']);

        if ($getAsset) {
            return $getAsset->external_link == null ? storage_asset($getAsset->file_name) : $getAsset->external_link;
        }

        return app('url')->asset('assets/img/placeholder.jpg');
    }

    public static function getPostImageName(int $postId): string
    {
        return Upload::where('post_id', $postId)->first(['file_original_name'])->file_original_name ?? "default image";
    }

    public static function showPostImageByFileName(string $fileName, ? string $externalLink = null): string
    {
        if ($fileName) {
            return $externalLink == null ? app('url')->asset('storage/' . $fileName) : $externalLink;
        }

        return app('url')->asset('assets/img/placeholder.jpg');
    }

    public static function getCategory(): object
    {
        return Category::where('parent_id', 0)->where('is_active', 1)
            ->get([
                'id',
                'en_name',
                'parent_id',
                'icon'
            ]);
    }
}
