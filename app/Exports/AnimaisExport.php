<?php

namespace App\Exports;

use App\Models\Animal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnimaisExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Animal::where('user_id', auth()->id())
        ->get();
        return $data;
    }
    public function headings(): array{
        return ['Nome','Tag','Descrição'];
    }
    public function map($linha): array
    {

        return [
            $linha->nome,
            $linha->tag,
            $linha->descricao
        ];
    }
}
