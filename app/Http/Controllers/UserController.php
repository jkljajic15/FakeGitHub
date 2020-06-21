<?php

namespace App\Http\Controllers;

use App\Events\NewFollowerEvent;
use App\Followee;
use App\Follower;
use App\Mail\newFollower;
use App\Notifications\FollowedByUserNotification;
use App\Repository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function myProfile(){

        return view('profile', [
            'user' => Auth::user(),
            'repositories' => Repository::where('user_id', Auth::id())->orderByDesc('stars')->simplePaginate(4),
            'user_starred_repository_ids' => $this->repository_ids()
        ]);
    }
    public function show($id){

        $repositories = Repository::where('user_id',$id)
            ->orderBy('stars','desc')
            ->simplePaginate(4);

        return view('profile',[
            'user' => User::find($id),
            'repositories' => $repositories,
            'followeeIds' => self::followeeIds(),
            'user_starred_repository_ids' => $this->repository_ids()
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

        // todo job
        $this->dbNotification($id);
        broadcast(new NewFollowerEvent($id))->toOthers();
        Mail::to(User::find($id))->queue(new newFollower(Auth::user()->name));

        return redirect()->back();
    }

    public function destroy($id){

        Followee::where('followee_id', $id)->where('user_id',Auth::id())->delete();
        Follower::where('follower_id', Auth::id())->where('user_id', $id)->delete();

        return redirect()->back();

    }

    public function getFollowers(){
        return view('followers', [
            'users' => $this->followers(),
            'followeeIds' => self::followeeIds()
        ]);
    }


    public function getFollowees(){

        return view('following', [
            'users' => $this->followees(),
            'followeeIds' => self::followeeIds()
        ]);
    }

    protected static function followeeIds(){
        return Auth::user()->followees->pluck('followee_id')->toArray();
    }

    public function markRead($id){
        Auth::user()->unreadNotifications()->where('id',$id)->get()->markAsRead();
        return redirect()->back();
    }

    /**
     * followers for auth user
     * @return array
     */
    public function followers(): array
    {
        $followers = [];
        foreach (Auth::user()->followers as $follower) {
            array_push($followers, User::find($follower->follower_id));
        }
        return $followers;
    }

    /**
     * followees for auth user
     * @return mixed
     */
    public function followees()
    {
        $followees = [];
        foreach (Auth::user()->followees as $followee) {
            array_push($followees, User::find($followee->followee_id));
        }
        return $followees;
    }

    public function storeImage(Request $request)
    {

        $request->validate(['image' => 'mimes:jpeg,jpg,png,gif|required|max:10000']);
//        Storage::delete('/public/images/' . Auth::user()->avatar);
        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $imageName, 'public');
        Auth::user()->avatar = $imageName;
        Auth::user()->save();

    }

    /**
     * @param $id
     */
    public function dbNotification($id): void
    {
        $userThatFollowed = User::find(Auth::id());
        $userToNotify = User::find($id);
        $userToNotify->notify(new FollowedByUserNotification($userThatFollowed));
    }

    /**
     * @return array
     */
    public function repository_ids(): array
    {
        return Auth::user()->repositoriesStarredByUser->pluck('id')->toArray();
    }


}
