<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'page',
                'created_at' => '2023-12-05 18:50:31',
                'updated_at' => '2023-12-05 18:50:31',
            ),
        ));
        
        
    }
}