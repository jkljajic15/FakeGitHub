<?php

use App\User;
use Illuminate\Support\Facades\Broadcast;



Broadcast::channel('new-follower.{userId}', function ($user, $userId) {
    return $user->id === User::find($userId)->id;
});
