<?php

use Illuminate\Database\Seeder;
use App\BlogPost;
use App\User;
class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        factory(BlogPost::class, 50)->make()->each(function($post) use ($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
