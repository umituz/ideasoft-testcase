<?php

namespace App\Observers;

use App\Services\Log\LogService;

class BaseObserver
{
    protected LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }
}
