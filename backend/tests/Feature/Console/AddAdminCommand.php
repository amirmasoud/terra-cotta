<?php

namespace Tests\Feature\Console;

use Tests\TestCase;

class AddAdminCommand extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     * @group  commands
     * @group  commands/AddAdmin
     * @return void
     */
    public function it_add_new_admin()
    {
        $this->artisan('add:admin', ['email' => 'admin@admin.com', 'password' => '123456'])
            ->expectsOutput('New admin user created.');

        $this->assertDatabaseHas('users', [
            'name' => 'admin@admin.com',
            'email' => 'admin@admin.com'
        ]);

        $this->artisan('add:admin', ['email' => 'admin@admin.com', 'password' => '123456'])
            ->expectsOutput('User email is duplicated.');
    }
}
