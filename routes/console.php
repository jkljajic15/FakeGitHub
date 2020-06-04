<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('dodaj', function (){


//    factory(\App\Followee::class)->create();

//    DB::insert('insert into starred_repositories (user_id, repository_id) values(?,?)',[6,1]);
//    DB::insert('insert into followers (user_id, follower_id) values(?,?)',[6,1]);
//    DB::insert('insert into followers (user_id, follower_id) values(?,?)',[6,4]);
    DB::insert('insert into followees (user_id, followee_id) values(?,?)',[6,1]);
    DB::insert('insert into followees (user_id, followee_id) values(?,?)',[6,4]);
});

Artisan::command('ispisi', function (){

//    dd(\App\Followee::all()->toArray());
//    $select = DB::select('select * from starred_repositories where user_id = ?',[6]);
//    $select = DB::select('select * from followers where user_id = ?',[6]);
//    $select = DB::select('select * from starred_repositories where user_id = ?',[6]);

//    dd($select);
//dd(\Illuminate\Support\Facades\Auth::id());
});
