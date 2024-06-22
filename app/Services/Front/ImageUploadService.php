<?php

namespace App\Services\Front;

use App\Models\Upload;
use Illuminate\Support\Facades\Auth;

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
}
