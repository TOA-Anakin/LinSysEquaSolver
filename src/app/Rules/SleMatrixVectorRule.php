<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SleMatrixVectorRule implements ValidationRule
{
    protected $vectorB;

    public function __construct($vectorB)
    {
        $this->vectorB = $vectorB;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (count($value) !== count($this->vectorB)) {
            $fail('The row count of matrixA must match the item count of vectorB.');
        }
    }
}
