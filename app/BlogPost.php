<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content'];  
    //protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function boot()
    {
        parent::boot();
        // static::deleting(function(BlogPost $b){
        //     $b->comments()->delete();
        // });
    }
}
