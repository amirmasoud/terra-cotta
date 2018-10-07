<?php

namespace Tests;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * @var \App\User
     */
    protected $user;

    /**
     * @var \Illuminate\Contracts\Console\Kernel
     */
    protected $artisan;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $this->artisan = $app->make(Kernel::class);
        $this->artisan->bootstrap();

        Hash::setRounds(4);

        return $app;
    }

    /**
     * Create admin user and run seeders.
     *
     * @return void
     */
    public function seedDatabase(): void
    {
        $this->artisan->call('migrate');

        // $this->artisan->call('db:seed', ['--class' => 'RolesTableSeeder']);
        // $this->artisan->call('db:seed', ['--class' => 'PermissionsTableSeeder']);
        // $this->artisan->call('db:seed', ['--class' => 'RoleHasPermissionTableSeeder']);
        $this->artisan->call('db:seed');

        $this->user = factory(User::class)->create();

        $this->user->assignRole('admin');
    }
}
