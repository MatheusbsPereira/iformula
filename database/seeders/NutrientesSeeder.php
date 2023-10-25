<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Exigencia;
use App\Models\Nutriente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class NutrientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
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
            'Ômega-3',
            'Ômega-6',
            'Ômega-9',
            'Água'
        ];
        $user = User::latest()->first(); 
        foreach ($nutrientes as $nutriente) {
            Nutriente::create([
                'nome' => $nutriente,
                'unidade' => 'kcal',
                'tag' => 'Vitamina',
                'user_id' => $user->id
            ]);
        }
        Animal::create([
            'nome'=> 'Vaca fase gestação',
            'tag' => 'bovino',
            'descricao' => 'Exigência nutricional para vaca em fase de gestação',
            'user_id' => $user->id
        ]);
        $animal = Animal::latest()->first(); 
        $new = Nutriente::all();
        foreach ($new as $nutriente) {
            # code...
            Exigencia::create([
                'valormax' => 20,
                'valormin' => 10,
                'animal_id'=> $animal->id,
                'nutriente_id'=> $nutriente->id,
                'user_id'=> $user->id
            ]);
        }
        
    }
}
