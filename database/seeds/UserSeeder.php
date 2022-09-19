<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'roles' => 'ADMIN',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'UserLatter',
            'email' => 'bagusaditya1899@gmail.com',
            'roles' => 'USER',
            'password' => Hash::make('password'),
        ]);
    }
}
