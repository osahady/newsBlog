<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title'=>$faker->city,
        'content'=> $faker->paragraphs(1, true),
        'created_at' => $faker->dateTimeBetween('-3 months'),
    ];
});

$factory->state(BlogPost::class, 'new-city', function (Faker $faker){
    return [
        'title' => 'A3adawi',
        'content'=> 'This region is under the regieme control'
    ];
});
