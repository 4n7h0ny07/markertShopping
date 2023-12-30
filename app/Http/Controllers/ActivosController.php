<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;

use PDF;
use App\Models\persona;
use App\Models\Activos;
use App\Models\cuenta;
use App\Models\user;


class ActivosController extends Controller
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
        //vista de los activos
        return view('requerimientos.activos.browse');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list($search = null)
    {
            $paginate = request('paginate') ?? 25;
            $user = Auth::user()->id;

            $activos = Activos::with(['persona', 'cuenta', 'empleado'])->where(function($q) use ($search) {
                if ($search){
                    $q->OrWhereRaw("id = '$search'")
                        ->OrWhereRaw("Number like '%$search%'")
                        ->OrWhereRaw("serialNumber like '%$search%'")
                        ->OrWhereRaw("marca like '%$search%'");
                }
            })->where('deleted_at', NULL)->where('user_id', $user)->orderBy('id', 'DESC')->paginate($paginate);
           
            //dd($activos);
            
           
           return view('requerimientos.activos.list', compact('activos'));

            
    }


    public function create()
    {
        //aqui es para crear los activos 

        $type = 'add';

        $personas = Persona::where('deleted_at', NULL)->whereHas('grupos', function ($query){
            $query->where('names', 'personal');
        })->get();

        $cuentas = cuenta::whereHas('tipocuenta', function ($query){
            $query->whereNull('deleted_at')->where('nametype', 'Activos');
        })->get();

        return view('requerimientos.activos.add-edit', compact('type', 'personas', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
             //insercion de los datos en la base de datos

        $formNumber = Activos::whereNull('deleted_at')->max('number');
        $newFormNumber = $formNumber + 1;
        $maxFormNumber = str_pad($newFormNumber, 6, '0', STR_PAD_LEFT);

        $numberCuentas = str_pad($request->input('cuentas'), 3, '0', STR_PAD_LEFT);

        $activar = Activos::create([
            'persona_id' => $request->personal,
            'cuenta_id' => $request->cuentas,
            'number' => $maxFormNumber,
            //'code_number',
            'name' => $request->name_activo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'serialNumber' => $request->serialnumber,
            'descriptions' => $request->descripcion,
            'costo' => $request->costo,
            'valor_residual' => $request->vresidual,
            'vida_util' => $request->vutil,
            'status_at' => true,
            'observaciones' => $request->observaciones,
            'user_id' => Auth::user()->id 
        ]);
        //dd($activar);
        DB::commit(); 
        
        $id = DB::getPdo()->lastInsertId();

        print($id);

        return redirect()->route('activos.index')->with(['message' =>'El activo fue registrado, con exito', 'alert-type' => 'success']);
        
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('activos.index')->with(['message' => 'Ocurrio un error al guardar el Activo', 'alert-type' => 'error']);
        }
       


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //para visualizar los activos en la vista show 

        $act = Activos::with(['persona', 'cuenta', 'empleado'])->where('id', $id)->WhereNull('deleted_at')->first();

        return view('requerimientos.activos.read', compact('act'));
    }

    public function print($id){
        $title_printer = "FORMULARIO DE SOLICITUD DE ALTA";
        $subTitle_printer = "DE ACTIVO FIJO";
        $printer =  Activos::with(['persona', 'cuenta', 'empleado' =>function ($q){
            $q->whereNull('deleted_at');
        }])->where('id', $id)->whereNull('deleted_at')->first();

        $pdf = PDF::loadView("printer.requerimientos.activos", compact('printer', 'title_printer', 'subTitle_printer'));
        $pdf_name = 'frm_' . $printer->number . '_' . str::Slug($printer->persona->names) . '.pdf';
        //return $pdf->setPaper('letter')->stream();
        return $pdf->download($pdf_name);
    }

    public function death(Request $request, $id){
       
        $baja= Activos::fileinode($id);
        $baja->status_at  = false;
        //$baja->baja_text  = $request->detalleBaja;
        $baja->save();

        $title_printer = "FORMULARIO DE SOLICITUD DE BAJA";
        $subTitle_printer = "DE ACTIVO FIJO";

        $printer =  Activos::with(['persona', 'cuenta', 'empleado' =>function ($q){
            $q->whereNull('deleted_at');
        }])->where('id', $id)->whereNull('deleted_at')->first();

        $pdf = PDF::loadView("printer.requerimientos.baja", compact('printer', 'title_printer', 'subTitle_printer'));
        $pdf_name = 'frm_' . $printer->number . '_' . str::Slug($printer->persona->names) . '.pdf';
        //return $pdf->setPaper('letter')->stream();
        return $pdf->download($pdf_name);
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
        DB::beginTransaction();
        try {
            Activos::where('id', $id)->update([
                'estado' => 'eliminado',
                'deleted_at' => Carbon::now()
            ]);
            DB::commit();
            return redirect()->route('activos.index')->with(['message' => 'El Activo fue eliminado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('activos.index')->with(['message' => 'Ocurrio un error al eliminar el producto', 'alert-type' => 'error']);
        }
    }
}
