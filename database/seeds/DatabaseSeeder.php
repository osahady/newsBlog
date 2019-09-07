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
        if($this->command->confirm('Do you want to refresh the database?')){
            $this->command->call('migrate:refresh');
            $this->command->info('Database is refreshed. . .');
        }
        $this->call([
                     UsersTableSeeder::class,
                     BlogPostsTableSeeder::class,
                     CommentsTableSeeder::class
        ]);
        
    }
}
