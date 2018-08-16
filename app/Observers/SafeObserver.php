<?php

namespace App\Observers;

use App\Safe;
use App\Events\Safe\Created as SafeCreated;

class SafeObserver
{
    /**
     * Handle the safe "created" event.
     *
     * @param  \App\Safe  $safe
     * @return void
     */
    public function created(Safe $safe)
    {

    }

    /**
     * Handle the safe "updated" event.
     *
     * @param  \App\Safe  $safe
     * @return void
     */
    public function updated(Safe $safe)
    {
        //
    }

    /**
     * Handle the safe "deleted" event.
     *
     * @param  \App\Safe  $safe
     * @return void
     */
    public function deleted(Safe $safe)
    {
        //
    }

    /**
     * Handle the safe "restored" event.
     *
     * @param  \App\Safe  $safe
     * @return void
     */
    public function restored(Safe $safe)
    {
        //
    }

    /**
     * Handle the safe "force deleted" event.
     *
     * @param  \App\Safe  $safe
     * @return void
     */
    public function forceDeleted(Safe $safe)
    {
        //
    }
}
