<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Comment;
use App\User;
class BlogPost extends Model
{
    use SoftDeletes;
    //protected $fillable = ['title', 'content'];  
    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //soft Deleting comments
    public static function boot()
    {
        parent::boot();
        static::deleting(function(BlogPost $b){
            $b->comments()->delete();
        });

        static::restoring(function(BlogPost $b){
            $b->comments()->restore();
        });
    }
}
