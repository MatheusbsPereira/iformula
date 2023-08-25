<?php

namespace App\Rules;

use App\Models\Ingrediente;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TagIngrediente implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $tag = Ingrediente::where('tag',$attribute)->where('user_id',auth()->id());
        if ($tag) {
            $fail('Você já cadastrou uma tag com esse nome');
        }
    }
}
