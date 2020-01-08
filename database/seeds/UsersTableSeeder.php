<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #admin user seed
        DB::table('users')
        ->insert([
            'name'  =>  'Admin Admin', 
            'email'  =>  'admin@test.com', 
            'user_role_id'  =>  1,
            'password' => Hash::make('admin'), 
        ]);
    }
}
