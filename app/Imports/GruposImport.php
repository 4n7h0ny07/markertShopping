<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\grupo;

class GruposImport implements ToModel, WithHeadingRow
{
   public function model(array $row)
   {
    return new grupo([
        'names' => $row['nombre_grupo'],
        'group_code' => $row['codigo'],
        'description' => $row['descripcion'],
        'created_at' => Date('Y-m-d H:i:s'),
    ]);
   }
}
