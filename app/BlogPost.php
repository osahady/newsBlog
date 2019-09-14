<?php

namespace App;

use App\User;
use App\Comment;
use App\Scopes\LatestScope;
use App\Scopes\DeleteAdminScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    //protected $fillable = ['title', 'content'];
    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include latest blogpost
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * Scope a query to only include most commented blogposts
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMostCommented(Builder $query)
    {
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }


    //soft Deleting comments
    public static function boot()
    {
        static::addGlobalScope(new DeleteAdminScope);
        parent::boot();

        // static::addGlobalScope(new LatestScope);

        static::deleting(function(BlogPost $b){
            $b->comments()->delete();
        });

        static::restoring(function(BlogPost $b){
            $b->comments()->restore();
        });
    }
}
