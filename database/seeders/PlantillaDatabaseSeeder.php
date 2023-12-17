<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class PlantillaDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seederPath = __DIR__.'/';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            MenusTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class           
        ]);
        $this->call(UsersTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
