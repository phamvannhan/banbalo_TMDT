<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewOrderEvent' => [
            'App\Listeners\NewOrderListener',
        ],
        'App\Events\IncrementViewEvent' => [
            'App\Listeners\IncrementViewListener',
        ],
        'App\Events\SendPasswordMailEvent' => [
            'App\Listeners\SendPasswordMailListener',
        ],
        'App\Events\SendSecretMailEvent' => [
            'App\Listeners\SendSecretMailListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
