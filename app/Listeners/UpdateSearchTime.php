<?php

namespace App\Listeners;

use App\Events\SearchTimeCounter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class UpdateSearchTime
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
     * @param  SearchTimeCounter  $event
     * @return void
     */
    public function handle(SearchTimeCounter $event)
    {

        $event->user->search_time += 1;
        $event->user->save();
    }
}
