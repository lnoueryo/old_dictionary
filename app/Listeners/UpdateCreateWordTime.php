<?php

namespace App\Listeners;

use App\Events\CreateWordTimeCounter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateCreateWordTime
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
     * @param  CreateWordTimeCounter  $event
     * @return void
     */
    public function handle(CreateWordTimeCounter $event)
    {
        $event->user->create_word_time += 1;
        $event->user->save();
    }
}
