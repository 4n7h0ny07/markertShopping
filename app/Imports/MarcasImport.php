<?php

namespace App\Imports;

use App\Models\marca;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarcasImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new marca([
            'image' => $row['imagen'],
            'names' => $row['marca'],
            'code' => $row['codigo'],
            'description' => $row['descripcion'],
            'created_at' => Date('Y-m-d H:i:s'),
        ]);
    }
}
