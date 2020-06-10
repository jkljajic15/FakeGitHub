<?php

namespace App\Http\Controllers;

use App\Followee;
use App\Follower;
use App\Notifications\FollowedByUserNotification;
use App\Repository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function show($id){

        $repositories = Repository::all()->where('user_id',$id);
        return view('profile',[
            'user' => User::find($id),
            'repositories' => $repositories,
            'followeeids' => self::followeeids()
            ]);
    }

    public function store($id){

        Followee::create([
            'user_id' => Auth::id(),
            'followee_id' => $id
        ]);
        Follower::create([
           'user_id' => $id,
           'follower_id' => Auth::id()
        ]);

        $userToNotify = User::find($id);
        $userToNotify->notify(new FollowedByUserNotification(Auth::user()->name));
        return redirect("/profile/$id");
    }

    public function destroy($id){

        Followee::where('followee_id', $id)->where('user_id',Auth::id())->delete();
        Follower::where('follower_id', Auth::id())->where('user_id', $id)->delete();

        return redirect("/profile/$id");

    }

    protected static function followeeids(){
        return Followee::all()->where('user_id', Auth::id())->pluck('followee_id')->toArray();
    }
}
