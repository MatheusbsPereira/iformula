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
            'Tiamina',
            'Riboflavina',
            'Niacina',
            'Vitamina B6',
            'Vitamina B12',
            'Ácido Fólico',
            'Vitamina B5',
            'Biotina ',
            'Vitamina H',
            'Vitamina B4',
            'Vitamina B10',
            'Vitamina B11',
            'Vitamina B13',
            'Vitamina B15',
            'Vitamina P',
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
