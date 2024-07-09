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
    public function About(): BelongsTo
    {
        return $this->belongsTo(About::class);
    }
}
