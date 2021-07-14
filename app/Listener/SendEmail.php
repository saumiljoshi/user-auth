<?php

namespace App\Listener;
use App\Event\generate;
use App\Event\UserCreated;
use App\Events\TaskEvent as EventsGenerate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmail
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        echo $event->email."<br/> call from listener side";
       
    }
}
