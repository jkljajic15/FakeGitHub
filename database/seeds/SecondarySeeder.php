<?php

use App\Followee;
use App\Follower;
use App\Issue;
use App\Issue_Comment;
use App\StarredRepository;
use Illuminate\Database\Seeder;

class SecondarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 21; $i++ ){
            factory(Issue::class)->create();

        }
        factory(Issue_Comment::class, 40)->create();
        factory(Follower::class, 10)->create();
        factory(Followee::class, 10)->create();
    }
}
