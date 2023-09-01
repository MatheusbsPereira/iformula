<?php

namespace App\Rules;

use App\Models\Ingrediente;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NomeIngrediente implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $nome = Ingrediente::where('nome',$attribute)->where('user_id',auth()->id())->first();
        if ($nome) {
            $fail('Você já cadastrou um ingrediente com esse nome');
        }
    }
}
