<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Database\Eloquent\Relations\HasMany;
class LastViewPost extends Model
{
    protected $table = 'last_view_posts';

    protected $guarded = [];
}
