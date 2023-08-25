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
        $nome = Nutriente::where('nome',$attribute)->where('user_id',auth()->id());
        if ($nome) {
            $fail('Você já cadastrou um nutriente com esse nome');
        }
    }
}
