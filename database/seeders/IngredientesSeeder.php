<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nomesIngredientes = [
            'Pão', 'Arroz', 'Feijão', 'Tomate', 'Cebola',
            'Cenoura', 'Frango', 'Alface', 'Maçã', 'Banana',
            'Batata', 'Queijo', 'Peixe', 'Ovos', 'Abacaxi',
            'Pêssego', 'Morango', 'Milho', 'Aveia', 'Iogurte',
            'Azeitona', 'Melancia', 'Limão', 'Uva', 'Mel',
            'Amêndoa', 'Canela', 'Chocolate', 'Espinafre', 'Salmão',
            'Pepino', 'Abóbora', 'Kiwi', 'Manga', 'Brócolis',
            'Abacate', 'Coco', 'Quinoa', 'Laranja', 'Gengibre',
            'Rúcula', 'Molho Soja', 'Aipo', 'Castanha', 'Damasco',
            'Pistache', 'Ervilha', 'Lentilha', 'Cogumelos', 'Alho'
        ];

        $ingredientes = [];

        foreach ($nomesIngredientes as $nomeIngrediente) {
            $ingredientes[] = [
                'nome' => $nomeIngrediente,
                'descricao' => 'Descrição do ' . $nomeIngrediente,
                'preco' => number_format(mt_rand(100, 999) / 100, 2),
                'tag' => strtolower(str_replace(' ', '_', $nomeIngrediente)),
                'categoria' => mt_rand(0, 1) ? 'macro' : 'micro',
            ];
        }
        $user = User::latest()->first();
        foreach ($ingredientes as $ingrediente) {
            Ingrediente::create([
                'nome' =>$ingrediente['nome'],
                'descricao' => $ingrediente['descricao'],
                'preco' => $ingrediente['preco'],
                'tag' => $ingrediente['tag'],
                'categoria' => $ingrediente['categoria'],
                'user_id' => $user->id
            ]);
        }
    }
}
