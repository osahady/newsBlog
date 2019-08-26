<?php

namespace App;
use App\Author;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
