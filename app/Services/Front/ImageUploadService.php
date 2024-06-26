<?php

namespace App\Services\Front;

use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * file upload and data store into uploads table
     *
     * @param object $file
     * @param int|null $postId
     * @return void
     */
    public static function fileUpload(object $file, ?int $postId = null):void
    {
        $upload = new Upload();
        $upload->extension = $file->getClientOriginalExtension();
        $upload->file_original_name = explode('.', $file->getClientOriginalName())[0];
        $upload->file_name = $file->store('uploads/all', 'public');
        $upload->user_id = Auth::user()->id;
        $upload->type = explode('/', $file->getClientMimeType())[0];
        $upload->file_size = $file->getSize();
        $upload->post_id = $postId ?? null;
        $upload->save();
    }

    public static function deletePostImage($postId): void
    {
        $getImage = Upload::where('post_id', $postId);
        if ($getImage->exists()) {
            foreach ($getImage->get(['id','file_name']) as $image) {
                if (Storage::disk('public')->exists($image->file_name)) {
                    Storage::disk('public')->delete($image->file_name);
                }
            }
            $getImage->delete();
        }
    }

    public static function getPostImage(int $postId): object
    {
        return Upload::where('post_id', $postId)->where('user_id', Auth::id())->get([
            'id',
            'file_original_name',
            'file_name',
            'external_link',
        ]);
    }

    public static function deletePostImageForEdit(int $postId, array $uploadIds):void
    {
        $getImage = Upload::where('post_id', $postId)->whereNotIn('id', $uploadIds);

        if ($getImage->exists()) {
            foreach ($getImage->get(['id','file_name']) as $image) {
                if (Storage::disk('public')->exists($image->file_name)) {
                    Storage::disk('public')->delete($image->file_name);
                }
            }
            $getImage->delete();
        }
    }
}
