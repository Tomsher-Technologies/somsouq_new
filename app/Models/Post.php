<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
   protected $table = 'posts';


    /**
     * @return void
     */
    public static function boot() {
        static::creating(function($post) {
            $post->created_by = Auth::user()->id;
        });
        static::updating(function($post) {
            $post->updated_by = Auth::user()->id;
        });

        parent::boot();
    }

}
