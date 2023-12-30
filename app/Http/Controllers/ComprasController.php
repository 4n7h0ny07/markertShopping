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
use App\Models\Requerimiento;
use App\Models\User;


class ComprasController extends Controller
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
        return view('requerimientos.compras.browse');
    }

    public function list($search = null)
    {
        $paginate = request('paginate') ?? 25;       
        $users = Auth::user()->id;
        $data = Requerimiento::with(['persona', 'empleado'])->where(function ($q) use ($search) {
            if ($search) {
                $q->OrWhereRaw("id = '$search'")
                    ->OrWhereRaw("number like '%$search%'")
                    ->OrWhereRaw("documento like '%$search%'")
                    ->OrWhereRaw("tipo_requerimiento like '%$search%'");
            }
        })->where('deleted_at', NULL)->where('user_id', $users)->orderBy('id', 'DESC')->paginate($paginate);
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
           // $id = DB::getPdo()->lastInsertId();
            //dd($id);
            DB::commit();

          
            return redirect()->route('compras.index')->with(['message' => 'Requerimeinto guardado exitosamente', 'alert-type' => 'success']);
            
        } catch (\Throwable $th) {
            //dd($th);
            DB::rollback();
            return redirect()->route('compras.index')->with(['message' => 'Ocurrio un error al guardar el Requerimiento', 'alert-type' => 'error']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $reg = Requerimiento::where('id', $id)->where('deleted_at', null)->first();

        return view('requerimientos.compras.read', compact('reg'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function print($id)
    {
        $title_printer = "FORMULARIO DE REQUERIMIENTO INTERNO";
        $subTitle_printer = "MATERIALES, SUMINISTROS Y OTROS";
        $printer = Requerimiento::with(['persona', 'empleado' => function ($q) {
            $q->whereNull('deleted_at');
        }])
            ->where('id', $id)->whereNull('deleted_at')->first();

        //return view('requerimientos.compras.read', compact('printer'));
        //return view("printer.requerimientos.compras", compact('printer'));
        $pdf = PDF::loadView("printer.requerimientos.compras", compact('printer', 'title_printer', 'subTitle_printer'));
        $pdf_name = 'Req_' . $printer->number . '_' . str::Slug($printer->persona->names) . '.pdf';
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
