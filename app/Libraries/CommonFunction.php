<?php

namespace App\Libraries;

use App\Models\Category;
use App\Models\State;
use App\Models\Upload;
use App\Models\User;

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

    public static function getState()
    {
        return State::where('status', 1)->pluck('name', 'id');
    }

    public static function getPostOwnerName(?int $createdBy): string|null
    {
        $getUser = User::where('id', $createdBy)->first(['name', 'username']);
        $user_name = '';
        if ($getUser) {
            if (empty($getUser->name)) {
                $user_name = $getUser->username;
            } else {
                $user_name = ucfirst($getUser->name);
            }
        }
        return $user_name;
    }

    public static function getPostOwnerPhoneNumber(?int $createdBy)
    {
        $getUser = User::where('id', $createdBy)->first(['phone_number']);
        $user_phone = '';
        if ($getUser) {
            $user_phone = $getUser->phone_number ?? "";
        }
        return $user_phone;
    }

    public static function getStateName(int $stateId): string
    {
        return State::where('id', $stateId)->first()->name ?? "";
    }
}
