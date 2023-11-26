<?php

namespace App\Http\Controllers;

use App\Exports\FabricasExport;
use App\Models\Fabrica;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FabricaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("fabrica.index");
    }

    public function exportsxlsx()
    {
        return Excel::download(new FabricasExport,'fabricas.xlsx');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $especie)
    {
        //
        $fabrica = Fabrica::where('especie',$especie)->where('user_id',auth()->id())->first();
        if($fabrica){
            return view('fabrica.show',['fabrica'=>$fabrica]);
        }else{
            return view('fabrica.nao-encontrado');
        }
    }

    
}
