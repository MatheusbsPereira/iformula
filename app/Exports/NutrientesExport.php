<?php

namespace App\Exports;

use App\Models\Nutriente;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NutrientesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Nutriente::where('user_id', auth()->id())
        ->get();
        return $data;
    }
    public function headings(): array{
        return ['Nome','Tag','Unidade'];
    }
    public function map($linha): array
    {

        return [
            $linha->nome,
            $linha->tag,
            $linha->unidade
        ];
    }
}
