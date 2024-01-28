<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;

class ApiAuthenticationHandler extends Exception
{
    use ApiResponse;

    public function handle(Exception $exception)
    {
        return $this->unauthorized();
    }
}
