<?php

namespace App\Rules;

use App\Models\Nutriente;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TagNutriente implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $tag = Nutriente::where('tag',$attribute)->where('user_id',auth()->id());
        if ($tag) {
            $fail('Você já cadastrou uma tag com esse nome');
        }
    }
}
