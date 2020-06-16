<?php

use App\StarredRepository;
use Illuminate\Database\Seeder;

class StarredRepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StarredRepository::class,20)->create();
    }
}
