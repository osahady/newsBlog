<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How many users do want?', 20), 1);
        factory(User::class)->states('osa-hady')->create();
        factory(User::class, $usersCount)->create();
    }
}
