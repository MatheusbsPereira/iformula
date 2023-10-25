<?php

namespace App\Exports;

use App\Models\Nutriente;
use Maatwebsite\Excel\Concerns\FromCollection;

class NutrientesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nutriente::where('user_id', auth()->id())->get();
    }
}
