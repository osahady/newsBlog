<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\BlogPost;
class Comment extends Model
{
    //use trait
    use SoftDeletes;

    protected $guarded = [];
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
