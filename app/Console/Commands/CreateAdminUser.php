<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

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
        $email = $this->argument('email');
        $name = $this->ask('What is your name?');

        $password = $this->secret('What is the password?');
        $password_confirm = $this->secret('Confirm the password');

        if ($password != $password_confirm) {
            $this->error('Passwords do not match');
        } else {
            $user = User::create([
                'email' => $email,
                'name' => $name,
                'password' => Hash::make($password)
            ]);
            // Do stuff here to make the user an admin user
            $user->email_verified_at = now();
            $user->save();
            $this->info("Admin user $user->name is created");
        }
    }
}
