<?php

namespace Hasob\FoundationCore\Listeners;

use Hasob\FoundationCore\Models\Rating;
use Hasob\FoundationCore\Models\RatingDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RatingDeletedListener
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
     * @param  RatingDeleted  $event
     * @return void
     */
    public function handle(RatingDeleted $event)
    {
        //
    }
}
