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
        $adminRole = \App\Models\Role::where('name', 'admin')->first();

        if ($adminRole) {
            \App\Models\User::create([
                'name' => 'Super Admin',
                'email' => 'admin@tributeenergy.com',
                'password' => bcrypt('admin123'),
                'role_id' => $adminRole->id,
            ]);
        }
    }
}
