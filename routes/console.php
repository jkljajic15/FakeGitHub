<?php

use App\Events\NewFollowerEvent;
use App\Notifications\FollowedByUserNotification;
use App\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
//    DB::insert('insert into followees (user_id, followee_id) values(?,?)',[6,1]);
//    DB::insert('insert into followees (user_id, followee_id) values(?,?)',[6,4]);

//    factory(\App\Issue::class,2)->create();
//    factory(\App\Issue_Comment::class,3)->create();

// \Illuminate\Support\Facades\Mail::to(User::first())->send(new \App\Mail\newFollower('test'));

//    \App\Repository::find(1)->increment('stars');

    NewFollowerEvent::dispatch(1);

//    factory(\App\StarredRepository::class)->create();
});

Artisan::command('ispisi', function (){

//    dd(\App\Followee::all()->toArray());
//    $select = DB::select('select * from starred_repositories where user_id = ?',[6]);
//    $select = DB::select('select * from followers where user_id = ?',[6]);
//    $select = DB::select('select * from starred_repositories where user_id = ?',[6]);

//    dd($select);
//dd(\Illuminate\Support\Facades\Auth::id()); // null
//    $user = App\User::find(6);
//    dd($user->unreadNotifications ? 'true': 'false');
//    $user->unreadNotifications()->dd();
//    $user->notify(new \App\Notifications\FollowedByUserNotification('ime usera'));


});

Artisan::command('zaprati-admina', function (){

    $userThatFollowed = User::all()->random();
    $userToNotify = User::find(1); //admin id = 1
    $userToNotify->notify(new FollowedByUserNotification($userThatFollowed));

});
