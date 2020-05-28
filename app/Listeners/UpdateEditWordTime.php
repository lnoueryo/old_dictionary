<?php

namespace App\Listeners;

use App\Events\EditWordTimeCounter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateEditWordTime
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
     * @param  EditWordTimeCounter  $event
     * @return void
     */
    public function handle(EditWordTimeCounter $event)
    {
        $event->user->edit_word_time += 1;
        $event->user->save();
    }
}
