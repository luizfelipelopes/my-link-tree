<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckHandler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // dd($attribute, $value);

        if(!preg_match('/^@[a-zA-Z0-9_-]+$/', $value)) {
            $fail('Você precisa começar com um @ e não pode ter espaços nem outros caracteres que não sejam - ou _');
        }
       
    }
}
