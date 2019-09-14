<?php

namespace App;

use App\BlogPost;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * Scope a query to only include active users
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithMostBlogPost($query)
    {
        return $query->withCount('blogPosts')
                     ->orderBy('blog_posts_count', 'desc');
    }

    /**
     * Scope a query to only include most active users last month
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithMostBlogPostLastMonth($query)
    {
        return $query->withCount(['blogPosts' => function(Builder $query){
            $query->whereBetween(static::CREATED_AT, [now()->subMonths(1), now()]);

        } ])->has('blogPosts', '>=', 2)->orderBy('blog_posts_count', 'desc');

    }
}
