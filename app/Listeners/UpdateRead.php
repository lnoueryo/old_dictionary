<?php

namespace App\Listeners;

use App\Events\Read;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateRead
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Read  $event
     * @return void
     */
    public function handle(Read $event)
    {
        $event->mail->read = 1;
        $event->mail->save();
    }
}
