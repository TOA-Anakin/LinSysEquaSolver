<?php

namespace App\Services;

use App\Rules\SleMatrixVectorRule;
use Illuminate\Support\Facades\Validator;

class SleValidationService
{
    /**
     * Validate the system of linear equations Ax=b.
     *
     * @param array $matrixA
     * @param array $vectorB
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate(array $matrixA, array $vectorB)
    {
        return Validator::make([
            'matrixA' => $matrixA,
            'vectorB' => $vectorB,
        ], [
            'matrixA' => ['required', 'array', new SleMatrixVectorRule($vectorB)],
            'vectorB' => 'required|array',
        ]);
    }
}