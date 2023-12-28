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

            $activos = Activos::with([])->where(function($q) use ($search) {
                if ($search){
                    $q->OrWhereRaw("id = '$search'")
                      ->OrWhereRaw("Number like '%$search%'")
                      ->OrWhereRaw("serialNumber like '%$search%'")
                      ->OrWhereRaw("marca like '%$search%'");
                }
            })->where('deleted_at', NULL)->where('user_id', $user)->orderBy('id', 'DESC')->paginate($paginate);
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
        $maxFormNumber = str_pad($formNumber, 6, '0', STR_PAD_LEFT);

        $numberCuentas = str_pad($request->input('cuentas'), 3, '0', STR_PAD_LEFT);

        $activar = Activos::create([
            'persona_id' => $request->personal,
            'cuenta_id' => $request->cuentas,
            'number' => $maxFormNumber,
            'code_number',
            'name' => $request->name_activo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'serialNumber' => $request->serialnumber,
            'descriptions' => $request->descripcion,
            'costo' => $request->costo,
            'vida_util' => $request->vutil,
            'observaciones' => $request->observaciones,
            'user_id' => Auth::user()->id 
        ]);

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

        $activ = Activos::where('id', $id)->WhereNull('deleted_at')->first();

        return view('requerimientos.activos.read', compact('activ'));
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
