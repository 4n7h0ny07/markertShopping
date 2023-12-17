<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-12-04 15:04:58',
                'updated_at' => '2023-12-04 15:04:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-12-04 15:04:58',
                'updated_at' => '2023-12-04 15:04:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-12-04 15:04:58',
                'updated_at' => '2023-12-04 15:04:58',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'grupos',
                'slug' => 'grupos',
                'display_name_singular' => 'Grupo',
                'display_name_plural' => 'Grupos',
                'icon' => 'voyager-group',
                'model_name' => 'App\\Models\\grupo',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-04 15:38:07',
                'updated_at' => '2023-12-04 16:30:29',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'personas',
                'slug' => 'personas',
                'display_name_singular' => 'Persona',
                'display_name_plural' => 'Personas',
                'icon' => 'voyager-people',
                'model_name' => 'App\\Models\\persona',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-04 15:46:53',
                'updated_at' => '2023-12-04 16:23:03',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'almacens',
                'slug' => 'almacens',
                'display_name_singular' => 'Almacen',
                'display_name_plural' => 'Almacens',
                'icon' => 'voyager-truck',
                'model_name' => 'App\\Models\\almacen',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-05 15:48:07',
                'updated_at' => '2023-12-05 15:48:57',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'categorias',
                'slug' => 'categorias',
                'display_name_singular' => 'Categoria',
                'display_name_plural' => 'Categorias',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\categoria',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-05 15:54:13',
                'updated_at' => '2023-12-05 15:56:15',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'marcas',
                'slug' => 'marcas',
                'display_name_singular' => 'Marca',
                'display_name_plural' => 'Marcas',
                'icon' => 'voyager-check-circle',
                'model_name' => 'App\\Models\\marca',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2023-12-05 15:59:51',
                'updated_at' => '2023-12-05 15:59:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'productos',
                'slug' => 'productos',
                'display_name_singular' => 'Producto',
                'display_name_plural' => 'Productos',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Models\\producto',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-05 16:05:47',
                'updated_at' => '2023-12-05 16:23:21',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'pricelists',
                'slug' => 'pricelists',
                'display_name_singular' => 'Lista de Precio',
                'display_name_plural' => 'Lista de Precios',
                'icon' => 'voyager-documentation',
                'model_name' => 'App\\Models\\pricelist',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2023-12-05 22:19:59',
                'updated_at' => '2023-12-05 22:19:59',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'priceproducts',
                'slug' => 'priceproducts',
                'display_name_singular' => 'Precio Producto',
                'display_name_plural' => 'Precios Productos',
                'icon' => 'voyager-paypal',
                'model_name' => 'App\\Models\\priceproduct',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-05 22:26:30',
                'updated_at' => '2023-12-05 22:33:08',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'cuentas',
                'slug' => 'cuentas',
                'display_name_singular' => 'Cuenta',
                'display_name_plural' => 'Cuentas',
                'icon' => 'voyager-book-download',
                'model_name' => 'App\\Models\\cuenta',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-08 12:37:34',
                'updated_at' => '2023-12-08 14:34:45',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'tipocuentas',
                'slug' => 'tipocuentas',
                'display_name_singular' => 'Tipocuenta',
                'display_name_plural' => 'Tipocuentas',
                'icon' => 'voyager-tag',
                'model_name' => 'App\\Models\\tipocuenta',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-12-08 12:46:17',
                'updated_at' => '2023-12-08 13:36:38',
            ),
        ));
        
        
    }
}