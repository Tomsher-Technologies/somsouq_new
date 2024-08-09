<?php

namespace App\Services\Front;

use App\Models\Post;

class CategoryWisePostDetailDataService
{
    protected static array $postDetailDate = [];
    public static function getData(int $categoryId, int $postId): object|null
    {
        $query = Post::query();

        switch ($categoryId) {
            case CategoryNameService::PROPERTY_FOR_RENT:
            case CategoryNameService::PROPERTY_FOR_SALE:

                $query->join('property_details', 'property_details.post_id', '=', 'posts.id')
                    ->select('posts.title', 'posts.price', 'posts.description', 'property_details.*')
                    ->where('property_details.post_id', $postId);

                static::$postDetailDate['data'] = $query->first();
                break;
            case CategoryNameService::VEHICLE_FOR_RENT:
            case CategoryNameService::VEHICLE_FOR_SALE:

                $query->join('vehicle_details', 'vehicle_details.post_id', '=', 'posts.id')
                    ->select('posts.title', 'posts.price', 'posts.description', 'vehicle_details.*')
                    ->where('vehicle_details.post_id', $postId);

                static::$postDetailDate['data'] = $query->first();
                break;
            case CategoryNameService::FASHION:
                $query->join('fashion_details', 'fashion_details.post_id', '=', 'posts.id')
                    ->select('posts.title', 'posts.price', 'posts.description', 'fashion_details.*')
                    ->where('fashion_details.post_id', $postId);

                static::$postDetailDate['data'] = $query->first();
                break;

            case CategoryNameService::ELECTRONIC:
                $query->join('electronic_details', 'electronic_details.post_id', '=', 'posts.id')
                    ->select('posts.title', 'posts.price', 'posts.description', 'electronic_details.*')
                    ->where('electronic_details.post_id', $postId);

                static::$postDetailDate['data'] = $query->first();
                break;
            default:
                break;
        }

       return static::$postDetailDate['data'];
    }
}
