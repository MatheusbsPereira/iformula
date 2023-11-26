<?php

namespace App\Exports;

use App\Models\Fabrica;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FabricasExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Fabrica::where('user_id', auth()->id())
        ->get();
        return $data;
    }
    public function headings(): array{
        return ['Espécie','Capacidade do Misturador','Descrição'];
    }
    public function map($linha): array
    {

        return [
            $linha->especie,
            $linha->capacidade_do_misturador,
            $linha->descricao
        ];
    }
}
