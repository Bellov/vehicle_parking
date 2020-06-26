<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;

class ParkingEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;

    /**
     * Create a new event instance.
     *
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}
