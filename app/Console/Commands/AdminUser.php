<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::factory()->createOne([
            'name' => 'Admin Dev',
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ]);
    }
}
