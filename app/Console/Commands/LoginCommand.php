<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class LoginCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:login {--username=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Console interface for logging in to the application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $credentials = [
            'name' => $this->option('username'),
            'password' => $this->option('password')
        ];

        if (Auth::attempt($credentials)) {
            Auth::user()->tokens()->delete();
            $token = Auth::user()->createToken('PAT');

            $this->info($token->plainTextToken);
        } else {
            $this->error('Invalid credentials');
        }
    }
}
