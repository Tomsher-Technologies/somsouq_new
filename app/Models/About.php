<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Database\Eloquent\Relations\HasMany;
class About extends Model
{
   protected $table = 'abouts';

    /**
     * Get the comments for the blog post.
     */
    public function AboutDescription(): HasMany
    {
        return $this->hasMany(AboutDescription::class);
    }
}
