<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhpScript implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!str_contains(trim(shell_exec("echo " . escapeshellarg('<?php '.$value) . " | php -l")), "No syntax errors")) {
            $fail('The :attribute must be valid php script');
        }
    }
}
