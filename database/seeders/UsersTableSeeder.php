<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lQWBHxSO0IniautTYvUncu/AoCRZt5D9IGWPf9Zlnql8MmiLv8IBe',
                'remember_token' => NULL,
                'settings' => '{"locale":"es"}',
                'created_at' => '2023-12-04 15:07:31',
                'updated_at' => '2023-12-04 15:08:19',
            ),
        ));
        
        
    }
}