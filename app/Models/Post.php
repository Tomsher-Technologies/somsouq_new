<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Facades\Auth;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Post extends Model
{
    use HasEagerLimit;

   protected $table = 'posts';

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }


    /**
     * @return void
     */
    public static function boot() {
        static::creating(function($post) {
            $post->created_by = Auth::guard('web')->user()->id;
        });

        static::updating(function($post) {
            if (Auth::guard('web')->check()) {
                $post->updated_by = Auth::guard('web')->user()->id;
            }

            if (Auth::guard('admin')->check()) {
                $post->updated_by = Auth::guard('admin')->user()->id;
            }
        });

        parent::boot();
    }

}
