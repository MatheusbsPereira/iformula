<?php

namespace App\Http\Controllers;

use App\Exports\FabricasExport;
use App\Models\Fabrica;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function exportspdf()
    {
        $pdf = Pdf::loadView('fabrica.pdf');
        return $pdf->download('fabricas.pdf');
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
