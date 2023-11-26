<?php

namespace App\Exports;

use App\Models\Ingrediente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IngredientesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Ingrediente::where('user_id', auth()->id())
        ->get();
        return $data;
    }
    public function headings(): array{
        return ['Nome','Tag','Descrição','Preço','Categoria'];
    }
    public function map($linha): array
    {

        return [
            $linha->nome,
            $linha->tag,
            $linha->descricao,
            'R$ '.$linha->preco,
            $linha->categoria
        ];
    }
}
