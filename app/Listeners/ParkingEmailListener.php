<?php

namespace App\Listeners;

use App\Mail\ParkingEmail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ParkingEmailListener implements ShouldQueue
{
    // set delay to 5 min
    public $delay = 300;

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->email)->send(new ParkingEmail());
    }
}
