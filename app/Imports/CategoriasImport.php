<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\categoria;

class CategoriasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new categoria([
            'names' => $row['categoria'],
            'code' => $row['codigo'],
            'description' => $row['descripcion'],
            'created_at' => Date('Y-m-d H:i:s'),
        ]);
    }
}
