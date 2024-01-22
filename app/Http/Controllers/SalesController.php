<?php

namespace App\Http\Controllers;

use App\Models\almacen;
use App\Models\marca;
use App\Models\persona;
use App\Models\planpagos;
use App\Models\pricelist;
use App\Models\priceproduct;
use App\Models\producto;
use App\Models\TipoPlanPago;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $almacen = almacen::whereNull('deleted_at')->get();
        $pricelist = pricelist::whereNull('deleted_at')->get();
        //vista indes de las ventas -  sales 
        return view('sales.browse', compact('almacen', 'pricelist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //par crear las ventas 

  // Obtener productos del almacén seleccionado que tienen precios asociados
//   $productos = Producto::where('almacen_id', $almacenId)
//   ->whereHas('preciosProducto', function ($query) use ($tipoPrecioId) {
//       $query->where('tipo_precio_id', $tipoPrecioId);
//   })
//   ->get();

        $tipoprecios = $request->tipolistaprecios;
        $almacen = $request->almacen;

        $type= 'add';

    $personas = persona::whereNull('deleted_at')->get();
    $productos = producto::with('marcas', 'categorias')->withTrashed()->where('almacen_id', $almacen)->whereNull('deleted_at')->get();

    $precios = priceproduct::whereNull('deleted_at')->where('pricelists_id', $tipoprecios)->whereIn('products_id', $productos->pluck('id')->toArray())->get();

    $tipopagos = TipoPlanPago::whereNull('deleted_at')->get();

//dd('<br>id tipo precio = :  '.$tipoprecios);
    return view('sales.add-edit', compact('personas', 'type', 'productos', 'tipopagos', 'precios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
