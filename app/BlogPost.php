<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //protected $fillable = ['title', 'content'];  
    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
