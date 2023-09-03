<?php

namespace Database\Seeders;

use App\Models\Nutriente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NutrientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nutrientes = [
            'Vitamina A',
            'Vitamina C',
            'Vitamina D',
            'Vitamina E',
            'Vitamina K',
            'Tiamina (Vitamina B1)',
            'Riboflavina (Vitamina B2)',
            'Niacina (Vitamina B3)',
            'Vitamina B6',
            'Vitamina B12',
            'Ácido Fólico (Vitamina B9)',
            'Vitamina B5 (Ácido Pantotênico)',
            'Biotina (Vitamina B7)',
            'Vitamina H (Vitamina B8)',
            'Vitamina B4 (Adenina)',
            'Vitamina B10 (PABA)',
            'Vitamina B11 (Ácido Salicílico)',
            'Vitamina B13 (Ácido Orótico)',
            'Vitamina B15 (Ácido Pangâmico)',
            'Vitamina P (Bioflavonoides)',
            'Vitamina U',
            'Vitamina Q10',
            'Ferro',
            'Zinco',
            'Cálcio',
            'Magnésio',
            'Fósforo',
            'Potássio',
            'Sódio',
            'Cobre',
            'Manganês',
            'Selênio',
            'Cromo',
            'Molibdênio',
            'Iodo',
            'Flúor',
            'Cloro',
            'Proteína',
            'Carboidratos',
            'Gorduras',
            'Fibras',
            'Açúcares',
            'Ácidos Graxos Essenciais',
            'Ácido Linoleico',
            'Ácido Alfa-Linolênico',
            'Ômega-3',
            'Ômega-6',
            'Ômega-9',
            'Água'
        ];

        foreach ($nutrientes as $nutriente) {
            Nutriente::create([
                'nome' => $nutriente,
                'unidade' => 'kcal',
                'tag' => 'Vitamina',
                'user_id' => 1
            ]);
        }
    }
}
