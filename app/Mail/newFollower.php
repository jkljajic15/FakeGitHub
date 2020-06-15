<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newFollower extends Mailable
{
    use Queueable, SerializesModels;
    public $followerName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($followerName)
    {
        //
        $this->followerName = $followerName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.newFollower');
    }
}
