<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Ganteng',
            'email' => 'emailadmin@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'Driver 1',
            'email' => 'driver1@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        $admin->assignRole('driver');
    }
}
