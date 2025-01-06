<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::firstOrCreate([
            'email'=>'admin@m.com',
        ],[
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'email'=>'admin@m.com',
        ])->assignRole('admin');

        User::firstOrCreate([
            'email'=>'user@m.com',
        ],[
            'name' => 'User',
            'password' => bcrypt('password'),
            'email'=>'user@m.com'
        ])->assignRole('user');
    }
}
