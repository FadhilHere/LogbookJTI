<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' => 'superadmin',
        ]);

        // Seed user admin
        User::create([
            'username' => '320',
            'password' => Hash::make('320'),
            'level' => 'admin',
        ]);
        User::create([
            'username' => '319',
            'password' => Hash::make('319'),
            'level' => 'admin',
        ]);
    }
}
