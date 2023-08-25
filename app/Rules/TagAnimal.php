<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TagAnimal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $tag = Animal::where('tag',$attribute)->where('user_id',auth()->id());
        if ($tag) {
            $fail('Você já cadastrou uma tag com esse nome');
        }
    }
}
