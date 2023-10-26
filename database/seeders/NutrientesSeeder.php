<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Exigencia;
use App\Models\Formacao;
use App\Models\Ingrediente;
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
            'nome' => 'Vaca fase gestação',
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
                'animal_id' => $animal->id,
                'nutriente_id' => $nutriente->id,
                'user_id' => $user->id
            ]);
        }
        $ingredientes = [
            ['nome' => 'Farinha de Trigo', 'descricao' => 'Farinha branca para panificação', 'tag' => 'Trigo', 'preco' => 3.99],
            ['nome' => 'Açúcar', 'descricao' => 'Açúcar refinado', 'tag' => 'Açúcar', 'preco' => 2.49],
            ['nome' => 'Leite', 'descricao' => 'Leite fresco', 'tag' => 'Leite', 'preco' => 1.99],
            ['nome' => 'Ovos', 'descricao' => 'Ovos frescos', 'tag' => 'Ovos', 'preco' => 2.99],
            ['nome' => 'Tomate', 'descricao' => 'Tomate vermelho', 'tag' => 'Tomate', 'preco' => 1.49],
            ['nome' => 'Cenoura', 'descricao' => 'Cenoura fresca', 'tag' => 'Cenoura', 'preco' => 0.99],
            ['nome' => 'Frango', 'descricao' => 'Peito de frango', 'tag' => 'Frango', 'preco' => 5.99],
            ['nome' => 'Arroz', 'descricao' => 'Arroz branco de grão longo', 'tag' => 'Arroz', 'preco' => 3.49],
            ['nome' => 'Feijão', 'descricao' => 'Feijão preto', 'tag' => 'Feijão', 'preco' => 2.29],
            ['nome' => 'Cebola', 'descricao' => 'Cebola amarela', 'tag' => 'Cebola', 'preco' => 1.19],
        ];
        foreach ($ingredientes as $ingrediente) {
            Ingrediente::create([
                'nome' => $ingrediente['nome'],
                'descricao' => $ingrediente['descricao'],
                'tag' => $ingrediente['tag'],
                'preco' => $ingrediente['preco'],
                'user_id' => $user->id
            ]);
        }
        $novos = Ingrediente::where('user_id', $user->id)->get();
        foreach ($novos as $novo) {
            foreach ($new as $nutriente) {
                # code...
                Formacao::create([
                    'valor' => 15,
                    'ingrediente_id' => $novo->id,
                    'nutriente_id' => $nutriente->id,
                    'user_id' => $user->id
                ]);
            }
        }

    }
}
