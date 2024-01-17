<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\grupo;
use App\Models\persona;


class ClientesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        $groupClientes = null;
        if ($row['grupo']){
           $groupClientes = grupo::firstOrCreate([
            'names' => $row['grupo'],
            ]); 
        }
        
        return new persona([
            'group_id' => $groupClientes ? $groupClientes->id : 1,
            'names' => $row['nombres'],
            'dni' => $row['nro_carnet'],
            'extencion' => $row['extension'],
            'expedito' => $row['expedito'],
            'telefono' => $row['telefono'],
            'direccion' => $row['direccion'],
            'photo' => $row['imagen'],
            'mailes' => $row['correo'],
            'created_at' => Date('Y-m-d H:i:s'),
        ]);
    }
}

