<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'msp:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create\'s a user in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is the user\'s name?',
            placeholder: 'WizardTux',
            required: true,
            hint: 'This is how the user is identified within the system.',
        );

        $email = text(
            label: 'What is your email address?',
            placeholder: 'connor@msp-tools.com',
            required: true,
            validate: ['email' => 'email|unique:users,email'],
            hint: 'This is the email address used to create the user account.',
        );

        $password = password(
            label: 'What password would you like this user to have?',
            placeholder: 'password',
            required: true,
            validate: ['password' => 'min:8'],
            hint: 'Minimum 8 characters.'
        );

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
    }
}
