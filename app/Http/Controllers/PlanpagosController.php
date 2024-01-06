<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;

use PDF;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


use App\Models\planpagos;
class PlanpagosController extends Controller
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
        //vista index
        return view('vendor.voyager.plan.browse');
    }

    public function list($search = null){
        $paginate = request('paginate') ?? 25;

        $planes = planpagos::whereNull('deleted_at')->orderBy('id', 'DESC')->paginate($paginate);

        return view('vendor.voyager.plan.list', compact('planes'));	
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $type='add';

        return view('vendor.voyager.plan.add-edit', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        
        try {
            //code...

            $plan = planpagos::create([
                'descripcion' => $request->descripcion,
                'nro_cuotas' => $request->cuotas,
                'primer_vencimiento' => $request->vencimiento,
                'dias_entre_cuotas' => $request->dias,
                'observaciones' => $request->observaciones,
                'status_ativo' => true,
                'user_id' => Auth::user()->id
            ]);
            //dd($plan);
            DB::commit();
            
            $id = DB::getPdo()->lastInsertId();

            print($id);

            return redirect()->route('plan.create')->with(['message' =>'El plan de pagos fue registrado, con exito', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            //dd($plan);
            DB::rollBack();
            return redirect()->route('plan.index')->with(['message' => 'Ocurrio un error al guardar el Plan de pagos', 'alert-type' => 'error']);
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
