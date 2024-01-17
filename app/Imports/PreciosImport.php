<?php

namespace App\Imports;

use App\Models\pricelist;
use App\Models\priceproduct;
use App\Models\producto;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PreciosImport implements ToModel, WithHeadingRow
{
   public function model(array $row)
   {

      //Producto::where('names', $row['producto'])->value('id');
      
      $productos = null;
      if ($row['producto']){
         $productos = producto::firstOrCreate([
          'names' => $row['producto'],
          ]); 
      }

      $precios = null;
      if ($row['precio']){
         $precios = pricelist::firstOrCreate([
          'namelists' => $row['precio'],
          ]); 
      }
//dd($productos,$precios);
      return new priceproduct([
         'products_id' => $productos ? $productos->id : 1,
         'pricelists_id' => $precios ? $precios->id : 1,
         'price_normal' => $row['precio_normal'],
         'price_promotion' => $row['precio_promocion'],
         'increment_precing' => $row['incremento'],
         'decrement_precing' => $row['descuento'],
         // 'user_id' => Auth()->id,
         'created_at' => Date('Y-m-d H:i:s'),
      ]);
      
   }
}
