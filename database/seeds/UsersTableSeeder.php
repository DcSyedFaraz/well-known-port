<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name'           => 'Admin',
            'email'          => 'dc.jahanzaib@gmail.com',
            'remember_token' => null,
            // 'email_verified_at' => Carbon::now(),
            'password'      => Hash::make('password'),
            // 'created_at'    => Carbon::now(),
            // 'updated_at'    => Carbon::now(),
        ]);

        $admin->roles()->sync(1);
    }
}
