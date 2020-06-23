<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shmc:addadmin {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add a admin user to the sports hall management calendar';

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
        $user = new User;

        $user->name = $this->argument('name');
        $user->email = $this->argument('email');
        $user->email_verified_at = now();
        $user->is_admin = true;
        $user->password = Hash::make($this->argument('password'));
        $user->remember_token = Str::random(10);

        $user->save();
    }
}
