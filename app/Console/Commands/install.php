<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\VoyagerServiceProvider;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markertShopping:install{--t|type=}{--r|reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initiate a new MarkertShopping';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //questions is the dataBase is Empty

        $empty_database = false;
        try {
            DB::table('users')->first();
        } catch (\Throwable $th) {
            $empty_database = true;
        }

        if ($empty_database || $this->option('reset')) {

            if ($this->option('reset')) {
                if (!$this->confirm('Estas seguro de querer vaciar la base de datos, Deseas continuar', false)) {
                    $this->info('Operacion cancelada, ya puedes respirar tranquilo');
                }
            }

            $this->call('key:generate');
            $this->call('storage:link');
            $this->call('migrate:fresh');
            $this->call('db:seed', ['--class' => 'PlantillaDatabaseSeeder']);
            $this->call('vendor:publish', ['--provider' => VoyagerServiceProvider::class, '--tag' => ['config', 'voyager_avatar']]);

            // $type = $this->option('type') ?? 'tecnoblue';
            // $this->call('db:seed', ['--class' => ucfirst($type).'MarcasTableSeeder']);
            // $this->call('db:seed', ['--class' => ucfirst($type).'TiposProductosTableSeeder']);
            // File::copyDirectory('public/publishable/'.$type, 'public/storage');
        
            $this->info('Hemos instalado MarkertShopping con exito');
            $this->info('Gracias por Instalar MarkertShopping');
            $this->call('serve');
        }else{
            $this->error('Detectamos una instalacion previa de MarkertShopping');
        }
    }
}
