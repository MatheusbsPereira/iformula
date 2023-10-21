<?php

namespace App\Livewire;

use App\Models\Animal;
use App\Models\Ingrediente;
use Livewire\Component;

class RacaoComponent extends Component
{
    public function render()
    {
        $ingredientes = Ingrediente::where("user_id", auth()->user()->id)->get();
        $animais = Animal::where("user_id", auth()->user()->id)->get();
        return view('livewire.racao-component', ['ingredientes' => $ingredientes, 'animais' => $animais]);
    }

    public $animal;
    public array $ingredientes = [];
    public $custoTotal = 0;
    public $melhorMistura = [];

    public function calcularMelhorMistura($nutrientCoefficients, $nutrientMin, $nutrientMax, $ingredientPrices, $ingredientCount, &$bestMixture, &$minCost, $currentMixture = [], $ingredientIndex = 0)
    {
        if ($ingredientIndex == $ingredientCount) {
            // Todas as quantidades de ingredientes foram escolhidas, calcular custo e verificar se atende aos requisitos de nutrientes
            $nutrientConstraintsMet = true;
            for ($nutrientIndex = 0; $nutrientIndex < count($nutrientCoefficients); $nutrientIndex++) {
                $nutrientValue = 0;
                for ($i = 0; $i < $ingredientCount; $i++) {
                    $nutrientValue += $currentMixture[$i] * $nutrientCoefficients[$nutrientIndex][$i];
                }
                // Verifica se a mistura atende às restrições de nutrientes
                if ($nutrientValue < $nutrientMin[$nutrientIndex] || $nutrientValue > $nutrientMax[$nutrientIndex]) {
                    $nutrientConstraintsMet = false;
                    break;
                }
            }

            if ($nutrientConstraintsMet) {
                // Calcula o custo da mistura atual
                $cost = 0;
                for ($i = 0; $i < $ingredientCount; $i++) {
                    $cost += $currentMixture[$i] * $ingredientPrices[$i];
                }

                // Verifica se é a mistura mais barata até agora
                if ($cost < $minCost) {
                    $minCost = $cost;
                    $bestMixture = $currentMixture;
                }
            }
        } else {
            // Tenta todas as quantidades possíveis para o ingrediente atual
            for ($quantity = 0; $quantity <= 100; $quantity += 0.5) {
                $currentMixture[$ingredientIndex] = $quantity;
                $this->calcularMelhorMistura($nutrientCoefficients, $nutrientMin, $nutrientMax, $ingredientPrices, $ingredientCount, $bestMixture, $minCost, $currentMixture, $ingredientIndex + 1);
            }
        }
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

        $ingredientes = Ingrediente::all();
        $ingredientPrices = $ingredientes->pluck('preco')->toArray();
        $ingredientNutrientValues = [];

        foreach ($ingredientes as $ingrediente) {
            $nutrientValues = $ingrediente->nutrientes()->pluck('valor')->toArray();
            $ingredientNutrientValues[] = $nutrientValues;
        }

        $ingredientCount = count($ingredientPrices);

        // Inicialize $minCost com um valor alto
        $minCost = PHP_INT_MAX;

        // Inicialize $bestMixture com quantidades zeros
        $bestMixture = array_fill(0, $ingredientCount, 0);

        // Chame a função de cálculo da melhor mistura
        $this->calcularMelhorMistura($ingredientNutrientValues, $valormin, $valormax, $ingredientPrices, $ingredientCount, $bestMixture, $minCost);

        // Normaliza as quantidades para que somem 100%
        $sum = array_sum($bestMixture);
        $bestMixture = array_map(function ($quantity) use ($sum) {
            return ($sum > 0) ? ($quantity / $sum) * 100 : 0;
        }, $bestMixture);

        // Exibe a melhor mistura
        $melhorMistura = [];
        for ($k = 0; $k < $ingredientCount; $k++) {
            $melhorMistura[] = ["ingrediente" => $k, "quantidade" => $bestMixture[$k]];
        }

        $this->melhorMistura = $melhorMistura;
        $this->custoTotal = $minCost;
    }
}
