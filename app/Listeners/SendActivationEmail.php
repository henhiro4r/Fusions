<?php

namespace App\Listeners;

use App\Events\UserActivationEmail;
use App\Mail\ActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail
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
     * @param  UserActivationEmail  $event
     * @return void
     */
    public function handle(UserActivationEmail $event)
    {
        if ($event->user->active){
            return;
        }else{
            Mail::to($event->user->email)->send(new ActivationEmail($event->user));
        }
    }
}
