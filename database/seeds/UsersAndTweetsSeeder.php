<?php

use Illuminate\Database\Seeder;

class UsersAndTweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate();
        App\Tweet::truncate();
        factory(App\User::class, 10)->create();
        factory(App\Tweet::class, 10)->create();
    }
}
