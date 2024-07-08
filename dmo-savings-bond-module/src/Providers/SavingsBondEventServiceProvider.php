<?php

namespace DMO\SavingsBond\Providers;

use DMO\SavingsBond\Events\OfferCreated;
use DMO\SavingsBond\Events\OfferDeleted;
use DMO\SavingsBond\Events\OfferUpdated;
use DMO\SavingsBond\Listeners\OfferCreatedListener;
use DMO\SavingsBond\Listeners\OfferDeletedListener;
use DMO\SavingsBond\Listeners\OfferUpdatedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class SavingsBondEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // OrganizationCreatedEvent::class => [
        //     OrganizationCreatedListener::class,
        // ]

        OfferDeleted::class => [
            OfferDeletedListener::class,
         ],

        OfferUpdated::class => [
            OfferUpdatedListener::class,
        ],

        OfferCreated::class => [
            OfferCreatedListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
