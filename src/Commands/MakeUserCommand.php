<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeUserCommand extends Command
{
    protected $signature = 'make:panel-user';

    protected $description = 'Create a new admin user for Universal Panel';

    public function handle(): int
    {
        $userModel = config('auth.providers.users.model', 'App\\Models\\User');

        if (! class_exists($userModel)) {
            $this->error("User model [{$userModel}] does not exist!");
            return self::FAILURE;
        }

        $name = $this->ask('Name', 'Admin User');
        $email = $this->ask('Email address');
        $password = $this->secret('Password');

        if (empty($email) || empty($password)) {
            $this->error('Email and password cannot be empty!');
            return self::FAILURE;
        }

        $user = new $userModel();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        $this->info("Admin user [{$email}] created successfully!");

        return self::SUCCESS;
    }
}
