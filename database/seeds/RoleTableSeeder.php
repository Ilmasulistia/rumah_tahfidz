<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'  => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Teacher',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Student',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Head',
        ]);
    }
}
