<?php

namespace App\Events\Safe;

use App\Safe;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Created
{
    use Dispatchable, SerializesModels;

    /**
     * Safe instance.
     *
     * @var \App\Safe
     */
    public $safe;

    /**
     * Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Safe $safe, Request $request)
    {
        $this->safe = $safe;
        $this->request = $request;
    }
}
