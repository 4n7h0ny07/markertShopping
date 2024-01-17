<?php

namespace App\Http\Controllers;

use App\Models\persona;
use App\Models\producto;
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
        //vista indes de las ventas -  sales 
        return view('sales.browse');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //par crear las ventas 

        $type= 'add';

    $personas = persona::whereNull('deleted_at')->get();

    $productos = producto::whereNull('deleted_at')->get();

    return view('sales.add-edit', compact('personas', 'type', 'productos'));
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
