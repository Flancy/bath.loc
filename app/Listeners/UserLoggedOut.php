<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoggedOut
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        activity()->log('<div class="alert alert-dark mb-1">Пользователь <span class="badge badge-dark">' . $event->user->name . '</span> вышел из системы<span class="badge badge-secondary float-right">' . now(). '</span></div>');
    }
}
