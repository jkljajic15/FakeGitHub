<?php

use App\Events\NewFollowerEvent;
use App\Issue;
use App\Notifications\FollowedByUserNotification;
use App\Repository;
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



// \Illuminate\Support\Facades\Mail::to(User::first())->send(new \App\Mail\newFollower('test'));


//    NewFollowerEvent::dispatch(1);

//    \App\Jobs\SendNotifications::dispatch(User::find(1),User::find(2));
});

Artisan::command('ispisi', function (){


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
