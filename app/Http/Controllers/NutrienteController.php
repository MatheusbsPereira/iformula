<?php

namespace App\Http\Controllers;

use App\Models\Nutriente;
use Illuminate\Http\Request;

class NutrienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('nutriente.index');
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
    public function show(Nutriente $nutriente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nutriente $nutriente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nutriente $nutriente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutriente $nutriente)
    {
        //
    }
}
