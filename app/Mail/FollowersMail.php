<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class FollowersMail extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    protected $follower;

    public function __construct($follower)
    {
        $this->follower = $follower->username;
    }

    public function build()
    {
        return $this->markdown('emails.followers')->with('follower', $this->follower);
    }

}