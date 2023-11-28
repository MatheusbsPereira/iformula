<?php

namespace App\Rules;

use App\Models\Fabrica;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EspecieFabrica implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $especie = Fabrica::where('especie',$value)->where('user_id',auth()->id())->first();
        if ($especie) {
            $fail('Você já cadastrou uma espécie com esse nome');
        }
    }
}
