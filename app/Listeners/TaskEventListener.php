<?php

namespace App\Listeners;

use App\Events\TaskEvent as EventsGenerate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskEventListener
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
     * @param  TaskEvent  $event
     * @return void
     */
    public function handle(EventsGenerate $event)
    {
        //
         dd($event);
    }
}
