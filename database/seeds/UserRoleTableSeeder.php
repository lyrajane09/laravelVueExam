<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #adminstrator seed
        DB::table('user_role')
        ->insert([
            'display_name'  =>  'Administrator', 
            'description'  =>  'Super User' 
        ]);

        #user seed
        DB::table('user_role')
        ->insert([
            'display_name'  =>  'User', 
            'description'  =>  'Can add expenses' 
        ]);
    }
}
