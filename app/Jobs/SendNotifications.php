<?php

namespace App\Jobs;

use App\Events\NewFollowerEvent;
use App\Http\Controllers\UserController;
use App\Mail\newFollower;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $userToNotify;
    private $auth;

    /**
     * Create a new job instance.
     *
     * @param $userToNotify
     * @param $auth
     */
    public function __construct($userToNotify, $auth)
    {
        //
        $this->userToNotify = $userToNotify;
        $this->auth = $auth;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        UserController::dbNotification($this->userToNotify->id,$this->auth->id);
        broadcast(new NewFollowerEvent($this->userToNotify->id))->toOthers();
        Mail::to(User::find($this->userToNotify->id))->queue(new newFollower($this->auth->name));
    }
}
