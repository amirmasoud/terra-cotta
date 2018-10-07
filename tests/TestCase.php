<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase, CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        $this->afterApplicationCreated(function() {
            $this->seedDatabase();
        });
    }
}
