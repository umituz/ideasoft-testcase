<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use Illuminate\Validation\ValidationException;

class ApiValidationHandler extends Exception
{
    use ApiResponse;

    public function handle(ValidationException $exception)
    {
        return $this->validationWarning($exception->errors(), __('Validation errors'));
    }
}
