<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class AboutDescription extends Model
{
   protected $table = 'about_descriptions';

    /**
     * Get the post that owns the comment.
     */
    public function About(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(About::class);
    }

    public function getTranslation($field, $lang)
    {
        return collect($this->getArrayAttributeByKey($field))[$lang] ?? null;
    }
}
