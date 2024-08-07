<?php

namespace App\Libraries;

use App\Models\Category;
use App\Models\City;
use App\Models\State;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Support\Facades\App;

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
                'ar_name',
                'so_name',
                'parent_id',
                'icon'
            ]);
    }

    public static function getCategoryName(int $category_id):object | null
    {
        return Category::where('id', $category_id)->where('parent_id', 0)->where('is_active', 1)
            ->first(['en_name', 'ar_name', 'so_name']);
    }

    public static function getSubCategoryName(int $sub_category_id):object | null
    {
        return Category::where('id', $sub_category_id)->where('parent_id', '!=',0)->where('is_active', 1)
            ->first(['en_name', 'ar_name', 'so_name']);
    }



    public static function getState()
    {
        return State::where('status', 1)->get(['id', 'name']);
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

    public static function getPostOwnerWhatsApp(?int $createdBy)
    {
        $getUser = User::where('id', $createdBy)->first(['w_app_number']);
        $user_phone = '';
        if ($getUser) {
            $user_phone = $getUser->w_app_number ?? "";
        }
        return $user_phone;
    }

    public static function getStateNameById(? int $stateId): string|null
    {
        $getState = State::where('id', $stateId)->first();

        return $getState->getTranslation('name', getLocaleLang());
    }

    public static function getCityName(? string $city): string|null
    {
        $lang = getLocaleLang();
        return json_decode($city)->$lang ?? "";
    }

    public static function getStateName(? string $state): string|null
    {
        $lang = getLocaleLang();
        return json_decode($state)->$lang ?? "";
    }

    public static function getPostOwnerProfile(?int $createdBy): string|null
    {
        $getUser = User::leftJoin('uploads', 'uploads.id', '=', 'users.image')
            ->where('users.id', $createdBy)
            ->first(['file_name']);

        if ($getUser->file_name) {
            return app('url')->asset('storage/' . $getUser->file_name);
        }

        return app('url')->asset('assets/frontEnd/images/user.png');
    }

    public static function getPostUserJoinDate(?int $createdBy): string|null
    {
        $getUser = User::where('id', $createdBy)->first(['created_at']);
        $join_date = '';
        if ($getUser) {
            $join_date = date('Y-m-d', strtotime($getUser->created_at));
        }
        return $join_date;
    }
}
