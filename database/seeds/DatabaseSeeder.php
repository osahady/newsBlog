<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\BlogPost;
use App\Comment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $osa = factory(User::class)->states('osa-hady')->create();
        $else = factory(User::class, 20)->create();

        //dd(get_class($osa), get_class($else));
        $users = $else->concat([$osa]);
        //dd($users->count());

        $posts = factory(BlogPost::class, 50)->make()->each(function($post) use ($users){
                    $post->user_id = $users->random()->id;
                    $post->save();
                });
        
        $comments = factory(Comment::class, 150)->make()->each(function($comment) use ($posts){
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
