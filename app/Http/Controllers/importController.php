<?php

namespace App\Http\Controllers;

use App\Imports\ClientesImport;
use App\Imports\GruposImport;
use App\Imports\MarcasImport;
use App\Imports\PlanpagosImport;
use App\Imports\PreciosImport;
use App\Imports\ProductosImport;
use App\Imports\CategoriasImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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

    public function store(Request $request)
    {

        $tipoImportar = $request->type;
        $files = $request->file('file');
        //dd($tipoImportar);
        switch ($tipoImportar) {
            case 'grupo':
                try {
                    Excel::import(new GruposImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new GruposImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                break;
            case 'personas':
                try {
                    Excel::import(new ClientesImport, $files);
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                break;
            case 'categorias':
                try {
                    Excel::import(new CategoriasImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new CategoriasImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de las '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'marcas':
                try {
                    Excel::import(new MarcasImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new MarcasImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de las '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'productos':
                try {
                    Excel::import(new ProductosImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new ProductosImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'precios':
                try {
                    Excel::import(new PreciosImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new PreciosImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            case 'planpagos':
                try {
                    // Excel::import(new PlanpagosImport, request()->file('file'));
                    return redirect()->route('import.index')->with(['message' => 'Importación de los ' . $tipoImportar . ', completa.', 'alert-type' => 'success']);
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . ', comuniquede con el desarrollador.', 'alert-type' => 'warning']);
                    //dd($failures);
                    // Manejar errores aquí
                } catch (\Exception $e) {
                    // Otro tipo de errores
                    return redirect()->route('import.index')->with(['message' => 'Error en la Importación de los,' . $tipoImportar . '', 'alert-type' => 'info']);
                }
                // Excel::import(new PlanpagosImport, request()->file('file'));
                // return redirect()->route('import.index')->with(['message' => 'Importación de los '.$tipoImportar.', completa.', 'alert-type' => 'success']);
                break;
            default:
                return redirect()->route('import.index')->with(['message' => 'Importación Error .', 'alert-type' => 'info']);
                break;
        }
        // try {
        //     Excel::import(new ClientesImport, request()->file('file'));
        //     return redirect()->route('import.index')->with(['message' => 'Importación completa.', 'alert-type' => 'success']);
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //     $failures = $e->failures();
        //     return redirect()->route('import.index')->with(['message' => 'Error en la Importación, comuniquede con el desarrollador.', 'alert-type' => 'warning']);
        //     //dd($failures);
        //     // Manejar errores aquí
        // } catch (\Exception $e) {
        //     // Otro tipo de errores
        //     return redirect()->route('import.index')->with(['message' => 'Error en la Importación.', 'alert-type' => 'info']);
        // }
        // Excel::import(new ClientesImport, request()->file('file'));
        // return redirect()->route('import.index')->with(['message' => 'Importación completa.', 'alert-type' => 'success']);
    }
}
