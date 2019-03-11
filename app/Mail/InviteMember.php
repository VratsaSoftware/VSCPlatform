<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $capitan;
    public $team;
    public $members;
    public $event;

    public function __construct($capitan, $team, $event)
    {
        $this->capitan = $capitan;
        $this->team = $team;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $test = ['capitan' => $this->capitan,'team' => $this->team,'members'=>$this->members,'event' => $this->event];
        return $this->from($this->capitan->email)
                ->markdown('events.mails.invite_member', compact('test'));
    }
}
