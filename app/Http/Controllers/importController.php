<?php

namespace App\Http\Controllers;

use App\Imports\CategoriasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;

use App\Imports\ClientesImport;
use App\Imports\GruposImport;
use App\Imports\MarcasImport;
use App\Imports\PlanpagosImport;
use App\Imports\PreciosImport;
use App\Imports\ProductosImport;

class importController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('import.browse');
    }

    public function store(Request $request){

        $tipoImportar = $request->type;
       // dd($tipoImportar);
        switch ($tipoImportar){
            case 'grupo':
                    Excel::import(new GruposImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'personas':
                    Excel::import(new ClientesImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de las'.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'categorias':
                    Excel::import(new CategoriasImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de las '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'marcas':
                    Excel::import(new MarcasImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de las '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'productos':
                    Excel::import(new ProductosImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'precios':
                    Excel::import(new PreciosImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'planpagos':
                Excel::import(new PlanpagosImport, request()->file('file'));
                return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
            break;
            default:
                    return redirect()->route('import.index')->with(['message' => 'Importación Error .', 'alert-type' => 'info']);
                break;
        }
        // Excel::import(new ClientesImport, request()->file('file'));
        //return redirect()->route('import.index')->with(['message' => 'Importación completa.', 'alert-type' => 'success']);
    }
}

