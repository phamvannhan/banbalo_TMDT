<?php

namespace App\Listeners;

use App\Events\IncrementViewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementViewListener implements ShouldQueue
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
     * @param  IncrementViewEvent  $event
     * @return void
     */
    public function handle(IncrementViewEvent $event)
    {
        $event->sp->luotxem += 1;
        $event->sp->save();
    }
}
