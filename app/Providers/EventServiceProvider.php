<?php

namespace App\Providers;
use App\Events\TaskEvent;
use App\listener\TaskEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\UserCreated' => [ 
            'App\Listener\SendEmail',
        ],
        //'App\Event\TaskEvent' => [
           // 'App\Listeners\TaskEventListener',
        //]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
       /*Event::listen(TaskEvent::class, [TaskEventListener::class,'handle']
       );
       Event::listen(function (TaskEvent $event){

       });*/
    }
}
