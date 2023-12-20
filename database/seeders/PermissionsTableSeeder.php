<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2023-12-04 15:04:59',
                'updated_at' => '2023-12-04 15:04:59',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_grupos',
                'table_name' => 'grupos',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 15:38:07',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_grupos',
                'table_name' => 'grupos',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 15:38:07',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_grupos',
                'table_name' => 'grupos',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 15:38:07',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_grupos',
                'table_name' => 'grupos',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 15:38:07',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_grupos',
                'table_name' => 'grupos',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 15:38:07',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_personas',
                'table_name' => 'personas',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 15:46:53',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_personas',
                'table_name' => 'personas',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 15:46:53',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_personas',
                'table_name' => 'personas',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 15:46:53',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_personas',
                'table_name' => 'personas',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 15:46:53',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_personas',
                'table_name' => 'personas',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 15:46:53',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_almacens',
                'table_name' => 'almacens',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:07',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_almacens',
                'table_name' => 'almacens',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:07',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_almacens',
                'table_name' => 'almacens',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:07',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_almacens',
                'table_name' => 'almacens',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:07',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_almacens',
                'table_name' => 'almacens',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:07',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_categorias',
                'table_name' => 'categorias',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:54:13',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'read_categorias',
                'table_name' => 'categorias',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:54:13',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'edit_categorias',
                'table_name' => 'categorias',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:54:13',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'add_categorias',
                'table_name' => 'categorias',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:54:13',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'delete_categorias',
                'table_name' => 'categorias',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:54:13',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'browse_marcas',
                'table_name' => 'marcas',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'read_marcas',
                'table_name' => 'marcas',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'edit_marcas',
                'table_name' => 'marcas',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'add_marcas',
                'table_name' => 'marcas',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'delete_marcas',
                'table_name' => 'marcas',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'browse_productos',
                'table_name' => 'productos',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:05:47',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'read_productos',
                'table_name' => 'productos',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:05:47',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'edit_productos',
                'table_name' => 'productos',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:05:47',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'add_productos',
                'table_name' => 'productos',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:05:47',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'delete_productos',
                'table_name' => 'productos',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:05:47',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'browse_pricelists',
                'table_name' => 'pricelists',
                'created_at' => '2023-12-05 22:20:00',
                'updated_at' => '2023-12-05 22:20:00',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'read_pricelists',
                'table_name' => 'pricelists',
                'created_at' => '2023-12-05 22:20:00',
                'updated_at' => '2023-12-05 22:20:00',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'edit_pricelists',
                'table_name' => 'pricelists',
                'created_at' => '2023-12-05 22:20:00',
                'updated_at' => '2023-12-05 22:20:00',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'add_pricelists',
                'table_name' => 'pricelists',
                'created_at' => '2023-12-05 22:20:00',
                'updated_at' => '2023-12-05 22:20:00',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'delete_pricelists',
                'table_name' => 'pricelists',
                'created_at' => '2023-12-05 22:20:00',
                'updated_at' => '2023-12-05 22:20:00',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'browse_priceproducts',
                'table_name' => 'priceproducts',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:26:30',
            ),
            61 => 
            array (
                'id' => 62,
                'key' => 'read_priceproducts',
                'table_name' => 'priceproducts',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:26:30',
            ),
            62 => 
            array (
                'id' => 63,
                'key' => 'edit_priceproducts',
                'table_name' => 'priceproducts',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:26:30',
            ),
            63 => 
            array (
                'id' => 64,
                'key' => 'add_priceproducts',
                'table_name' => 'priceproducts',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:26:30',
            ),
            64 => 
            array (
                'id' => 65,
                'key' => 'delete_priceproducts',
                'table_name' => 'priceproducts',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:26:30',
            ),
            65 => 
            array (
                'id' => 66,
                'key' => 'browse_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 12:37:34',
            ),
            66 => 
            array (
                'id' => 67,
                'key' => 'read_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 12:37:34',
            ),
            67 => 
            array (
                'id' => 68,
                'key' => 'edit_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 12:37:34',
            ),
            68 => 
            array (
                'id' => 69,
                'key' => 'add_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 12:37:34',
            ),
            69 => 
            array (
                'id' => 70,
                'key' => 'delete_cuentas',
                'table_name' => 'cuentas',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 12:37:34',
            ),
            70 => 
            array (
                'id' => 71,
                'key' => 'browse_tipocuentas',
                'table_name' => 'tipocuentas',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 12:46:17',
            ),
            71 => 
            array (
                'id' => 72,
                'key' => 'read_tipocuentas',
                'table_name' => 'tipocuentas',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 12:46:17',
            ),
            72 => 
            array (
                'id' => 73,
                'key' => 'edit_tipocuentas',
                'table_name' => 'tipocuentas',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 12:46:17',
            ),
            73 => 
            array (
                'id' => 74,
                'key' => 'add_tipocuentas',
                'table_name' => 'tipocuentas',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 12:46:17',
            ),
            74 => 
            array (
                'id' => 75,
                'key' => 'delete_tipocuentas',
                'table_name' => 'tipocuentas',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 12:46:17',
            ),
        ));
        
        
    }
}