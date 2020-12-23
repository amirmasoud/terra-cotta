<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase, CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        $this->afterApplicationCreated(function() {
            $this->artisan->call('migrate');

            $this->artisan->call('db:seed', ['--class' => 'RolesTableSeeder']);
            $this->artisan->call('db:seed', ['--class' => 'PermissionsTableSeeder']);
            $this->artisan->call('db:seed', ['--class' => 'RoleHasPermissionTableSeeder']);

            $this->user = factory(User::class)->create();

            $this->user->assignRole('admin');
        });
    }
}
