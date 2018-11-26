<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin
                            {email : Email of admin user}
                            {password : Password of admin user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! User::whereEmail($this->argument('email'))->exists()) {
            User::create([
                'name' => $this->argument('email'),
                'email' => $this->argument('email'),
                'password' => bcrypt($this->argument('password'))
            ]);

            $this->info('New admin user created.');
        } else {
            $this->error('User email is duplicated.');
        }
    }
}
