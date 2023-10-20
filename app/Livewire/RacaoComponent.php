<?php

namespace App\Livewire;

use App\Models\Animal;
use App\Models\Ingrediente;
use Livewire\Component;

class RacaoComponent extends Component
{
    public $animal;
    public array $ingredientes = [];

    public function render()
    {
        $ingredientes = Ingrediente::where("user_id", auth()->user()->id)->get();
        $animais = Animal::where("user_id", auth()->user()->id)->get();
        return view('livewire.racao-component', ['ingredientes' => $ingredientes, 'animais' => $animais]);
    }

    public function save()
    {
        $animal = Animal::find($this->animal);
        $nutrientes = $animal->nutrientes()->get();
        $valormin = [];
        $valormax = [];
        foreach ($nutrientes as $nutriente) {
            $valormin[] = $nutriente->pivot->valormin;
            $valormax[] = $nutriente->pivot->valormax;
        }
        $t = [5,4];
        $ingredientes = Ingrediente::where("user_id", auth()->user()->id)->whereIn('id',$t)->get();
        dd($ingredientes);
        $ingredientPrices = $ingredientes->pluck('preco')->toArray();
        $ingredientNutrientValues = [];

        foreach ($ingredientes as $ingrediente) {
            $nutrientValues = $ingrediente->nutrientes()->pluck('valor')->toArray();
            $ingredientNutrientValues[] = $nutrientValues;
        }

        $ingredientCount = count($ingredientPrices);
        $minCost = PHP_INT_MAX;
        $bestMixture = array_fill(0, $ingredientCount, 0);

        $this->calcularMelhorMistura($valormin, $valormax, $ingredientPrices, $ingredientCount, $ingredientNutrientValues, $bestMixture, $minCost);

        // Normaliza as quantidades para que somem 100%
        $sum = array_sum($bestMixture);
        $bestMixture = array_map(function ($quantity) use ($sum) {
            return ($sum > 0) ? ($quantity / $sum) * 100 : 0;
        }, $bestMixture);

        // Exibe a melhor mistura
        echo "Melhor mistura de ingredientes:\n";
        for ($k = 0; $k < $ingredientCount; $k++) {
            echo "Quantidade de Ingrediente {$k}: {$bestMixture[$k]}%\n";
        }
        echo "Custo total: R$ {$minCost}\n";
    }

    public function calcularMelhorMistura($nutrientMin, $nutrientMax, $ingredientPrices, $ingredientCount, $ingredientNutrientValues, &$bestMixture, &$minCost, $currentMixture = [], $ingredientIndex = 0)
    {
        if ($ingredientIndex == $ingredientCount) {
            $nutrientConstraintsMet = true;
            for ($nutrientIndex = 0; $nutrientIndex < count($ingredientNutrientValues[0]); $nutrientIndex++) {
                $nutrientValue = 0;
                for ($i = 0; $i < $ingredientCount; $i++) {
                    $nutrientValue += $currentMixture[$i] * $ingredientNutrientValues[$i][$nutrientIndex];
                }

                if ($nutrientValue < $nutrientMin[$nutrientIndex] || $nutrientValue > $nutrientMax[$nutrientIndex]) {
                    $nutrientConstraintsMet = false;
                    break;
                }
            }

            if ($nutrientConstraintsMet) {
                $cost = 0;
                for ($i = 0; $i < $ingredientCount; $i++) {
                    $cost += $currentMixture[$i] * $ingredientPrices[$i];
                }

                if ($cost < $minCost) {
                    $minCost = $cost;
                    $bestMixture = $currentMixture;
                }
            }
        } else {
            for ($quantity = 0; $quantity <= 100; $quantity += 0.5) {
                $currentMixture[$ingredientIndex] = $quantity;
                $this->calcularMelhorMistura($nutrientMin, $nutrientMax, $ingredientPrices, $ingredientCount, $ingredientNutrientValues, $bestMixture, $minCost, $currentMixture, $ingredientIndex + 1);
            }
        }
    }
}
