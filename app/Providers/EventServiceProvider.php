<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * 이벤트와 이벤트 리스너를 매핑시킴.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ModelChanged::class => [
            \App\Listeners\CacheHandler::class,
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
