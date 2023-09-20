<?php

namespace App\Rules;

use App\Models\Nutriente;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NomeNutriente implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $nomeExistente = Nutriente::where('nome', $value)
        ->where('user_id', auth()->id())
        ->first();

        if ($nomeExistente) {
        $fail('Você já cadastrou um nutriente com esse nome');
        }
    }
}
