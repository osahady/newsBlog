<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogPost;
class Comment extends Model
{
    protected $guarded = [];
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
