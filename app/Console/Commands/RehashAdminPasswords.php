<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class RehashAdminPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:rehash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rehash passwords for all admin records';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Retrieve all admin records
        $admins = Admin::all();

        // Loop through each admin record
        foreach ($admins as $admin) {
            // Rehash the password using Bcrypt
            $admin->password = Hash::make($admin->password);
            
            // Save the updated admin record
            $admin->save();
        }

        $this->info("Passwords rehashed successfully!");

        return 0;
    }
}
