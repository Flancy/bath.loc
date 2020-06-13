<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        activity()->log('<div class="alert alert-success mb-1">Пользователь <span class="badge badge-dark">' . $event->user->name . '</span> вошел в систему<span class="badge badge-secondary float-right">' . now(). '</span></div>');
    }
}
