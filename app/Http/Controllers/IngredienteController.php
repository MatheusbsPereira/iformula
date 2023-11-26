<?php

namespace App\Http\Controllers;

use App\Exports\IngredientesExport;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ingrediente.index');
    }
    public function exportsxlsx()
    {
        return Excel::download(new IngredientesExport,'ingredientes.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $nome)
    {
        //
        $ingrediente = Ingrediente::where('nome',$nome)->where('user_id',auth()->id())->first();
        if($ingrediente){
            return view('ingrediente.show',['ingrediente'=>$ingrediente]);
        }else{
            return view('ingrediente.nao-encontrado');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingrediente)
    {
        //
    }
}
