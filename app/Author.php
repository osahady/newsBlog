<?php

namespace App;
use App\Profile;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = []; 
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
