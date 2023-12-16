<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\persona;
use Illuminate\Support\Facades\DB;

use App\Models\Requerimiento;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('requerimientos.compras.browse');
    }

    public function list($search = null){
        $paginate = request('paginate') ?? 10;

        $data = Requerimiento::where(function($q) use ($search){
            if ($search) {
                $q->OrWhereRaw("id = '$search'")
                ->OrWhereRaw("number like '%$search%'")
                ->OrWhereRaw("documento like '%$search%'")
                ->OrWhereRaw("tipo_requerimiento like '%$search%'");
            }
        })->where('deleted_at', NULL)->orderBy('id', 'DESC')->paginate($paginate);
            return view('requerimientos.compras.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = 'add';
        //$personas = Persona::where('deleted_at', NULL,);
        $personas = Persona::whereHas('grupos', function ($query) {
            $query->where('names', 'proveedores');
        })->get();

        return view('requerimientos.compras.add-edit', compact('type', 'personas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //      
        DB::beginTransaction();

        try {
            // Obtener el último número de compra
            $ultimoNumeroCompra = Requerimiento::whereNull('deleted_at')->max('number');
           
            // Incrementar el último número en uno
            $nuevoNumero = $ultimoNumeroCompra + 1;

            // Formatear con ceros a la izquierda para tener siempre 6 dígitos
            $numeroAscendente = str_pad($nuevoNumero, 6, '0', STR_PAD_LEFT);
            $total = $request->input('tpagar');
            $adelanto = $request->input('anticipo');
            $saldo = null;
            if (isset($adelanto)) {
                $saldo = $total - $adelanto;
            } else {
                $adelanto = null;
            }

            $compra = Requerimiento::create([
                'persona_id' => $request->proveedor_id,
                'number' => $numeroAscendente,
                'monto' => $request->tpagar,
                'adelanto' => $request->anticipo,
                'saldo' => $saldo,
                'descriptions' => $request->requerimiento,
                'tipo_requerimiento' => $request->tipo,
                'documento' => $request->documento,
                'observaciones' => $request->observaciones,
                'user_id' => Auth::user()->id
            ]);
            // dd($compra);
            DB::commit();
            return redirect()->route('compras.index')->with(['message' => 'Requerimeinto guardado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect()->route('compras.index')->with(['message' => 'Ocurrio un error al guardar el Requerimiento', 'alert-type' => 'error']);
        }
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
