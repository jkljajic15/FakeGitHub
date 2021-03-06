<?php

use App\Followee;
use App\Follower;
use App\Issue;
use App\Issue_Comment;
use App\Repository;
use App\StarredRepository;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Repository::class, 20)->create();
        factory(StarredRepository::class,20)->create();

        $this->call(SecondarySeeder::class);
    }
}
