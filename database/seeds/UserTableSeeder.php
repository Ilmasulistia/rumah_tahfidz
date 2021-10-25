<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => Str::random(10),
            'role_id' => 1,
            'username' => 'admin',
            'email' => 'admin@gmail.com',      
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(30),
        ]);
        DB::table('users')->insert([
            'user_id' => Str::random(10),
            'role_id' => 2,
            'username' => 'guru',
            'email' => 'guru@gmail.com',      
            'password' => bcrypt('guru'),
            'remember_token' => Str::random(30),
        ]);
        DB::table('users')->insert([
            'user_id' => Str::random(10),
            'role_id' => 3,
            'username' => 'santri',
            'email' => 'santri@gmail.com',      
            'password' => bcrypt('santri'),
            'remember_token' => Str::random(30),
            
        ]);
    }
}