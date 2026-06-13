<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if admin user already exists
        $existingAdmin = \App\Models\User::where('email', 'admin@tributeenergy.com')->first();

        if ($existingAdmin) {
            $this->command->info('Admin user already exists. Skipping creation.');
            return;
        }

        $adminRole = \App\Models\Role::where('name', 'admin')->first();

        if (!$adminRole) {
            $this->command->error('Admin role not found. Please run RoleSeeder first.');
            return;
        }

        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'admin@tributeenergy.com',
            'password' => bcrypt('admin123'),
            'role_id' => $adminRole->id,
        ]);

        $this->command->info('Admin user created successfully.');
        $this->command->info('Email: admin@tributeenergy.com');
        $this->command->info('Password: admin123');
    }
}
