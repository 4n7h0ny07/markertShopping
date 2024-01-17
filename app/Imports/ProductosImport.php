<?php

namespace App\Imports;

use App\Models\almacen;
use App\Models\categoria;
use App\Models\marca;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\producto;
class ProductosImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        $almacen = null;
        if ($row['almacen']){
           $almacen = almacen::firstOrCreate([
            'names' => $row['almacen'],
            ]); 
        }
        $categoria = null;
        if ($row['categoria']){
           $categoria = categoria::firstOrCreate([
            'names' => $row['categoria'],

            ]); 
        }
        $marca = null;
        if ($row['marca']){
           $marca = marca::firstOrCreate([
            'names' => $row['marca'],

            ]); 
        }
        //
        return new Producto([
        'almacen_id' => $almacen ? $almacen->id : 1,
        'categoria_id' => $categoria ? $categoria->id : 1,
        'marca_id' => $marca ? $marca->id : 1,
        'image' => $row['imagen'],
        'code' => $row['codigo'],
        'names' => $row['producto'],
        'model' => $row['modelo'],
        'price' => $row['precio'],
        'imei' => $row['imei'],
        'mac' => $row['mac'],
        'description' => $row['descripcion'],
        'created_at' => Date('Y-m-d H:i:s'),
        ]);


    }
}
