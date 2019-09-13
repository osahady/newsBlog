<?php

namespace App;

use App\BlogPost;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //use trait
    use SoftDeletes;

    protected $guarded = [];
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LatestScope);
    }
}
