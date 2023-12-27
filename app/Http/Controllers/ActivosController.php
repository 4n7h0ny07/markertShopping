<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
//use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use App\Models\persona;
use App\Models\Activos;
use App\Models\cuenta;
use App\Models\User;

class ActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('requerimientos.activos.browse');
    }

    public function list($search = null)
    {
        $paginate = request('paginate') ?? 10;
        $users = Auth::user()->id;
        $data = Activos::with(['persona', 'cuenta', 'empleado'])->where(function ($q) use ($search) {
            if ($search) {
                $q->OrWhereRaw("id = '$search'")
                    ->OrWhereRaw("number like '%$search%'")
                    ->OrWhereRaw("documento like '%$search%'")
                    ->OrWhereRaw("tipo_requerimiento like '%$search%'");
            }
        })->where('deleted_at', NULL)->where('user_id', $users)->orderBy('id', 'DESC')->paginate($paginate);
        return view('requerimientos.activos.list', compact('data'));

        //$data = Requerimiento::where('deleted_at', NULL)->orderBy('id', 'DESC')->paginate($paginate);
        //dd($data);
       // return view('requerimientos.activos.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = 'add';
        //$personas = Persona::where('deleted_at', NULL,);
        $personas = Persona::whereHas('grupos', function ($query) {
            $query->where('names', 'personal',);
        })->get();

        $cuenta = cuenta::whereHas('tipocuenta', function ($query) {
            $query->where('nametype', 'activos',);
        });

        return view('requerimientos.activos.add-edit', compact('type', 'personas', 'cuenta'));
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
            $ultimoNumeroActivo = Activos::whereNull('deleted_at')->max('number');

            // Incrementar el último número en uno
            $nuevoNumero = $ultimoNumeroActivo + 1;
            // Formatear con ceros a la izquierda para tener siempre 6 dígitos
            $numeroAscendente = str_pad($nuevoNumero, 6, '0', STR_PAD_LEFT);
            //armar codigo de activo para insersion en la base de datos 
            $id_cuenta = str_pad($request->input('cuentas'), 3, '0', STR_PAD_LEFT);
            $cuenta = Cuenta::find($request->input('cuentas'));
            $id_tipocuenta = str_pad($cuenta->tipocuenta_id, 2, '0', STR_PAD_LEFT);
            $code_number = $id_cuenta.'-'.$id_tipocuenta;
            

            $compra = Activos::create([
                'persona_id' => $request->personal,
                'cuenta_id' => $request->cuentas,
                'number' => $numeroAscendente,
                'code_number',
                'name' => $request->name_activo,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'serialNumber' => $request->serialnumber,
                'descriptions' => $request->descripcion,
                'costo' => $request->proveedor_id,
                'vida_util' => $request->proveedor_id,
                'observaciones' => $request->observaciones,
                'user_id' => Auth::user()->id             

            ]);
            // dd($compra);

            $ultimaIdInsertada = DB::getPdo()->lastInsertId();
            DB::commit();

            print($ultimaIdInsertada);

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
        $reg = Activos::where('id', $id)->where('deleted_at', null)->first();

        return view('requerimientos.activos.read', compact('reg'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function print($id)
    {
        
        $printer = Activos::with(['persona', 'empleado' => function($q){
            $q->whereNull('deleted_at');
        }])                    
        ->where('id', $id)->whereNull('deleted_at')->first();

        //return view('requerimientos.compras.read', compact('printer'));
        //return view("printer.requerimientos.compras", compact('printer'));
        $pdf = PDF::loadView("printer.requerimientos.activos", compact('printer'));
        $pdf_name= 'frm_4_'.$printer->number.'_'.str::Slug($printer->persona->names).'.pdf';
        //return $pdf->setPaper('letter')->stream();
        return $pdf->download($pdf_name);
    }
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
