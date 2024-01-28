<?php

namespace App\Services\Log;

use App\Services\Adapters\Log\FileLoggerAdapter;
use App\Services\Adapters\Log\LoggerAdapter;
use App\Traits\Logger;

class LogService
{
    use Logger;

    public function __construct()
    {
        $this->setDefaultLogger();
    }

    public function setDefaultLogger()
    {
        $this->setFileLoggerAdapter();
    }

    public function setLoggerAdapter()
    {
        $loggerAdapter = new LoggerAdapter();

        $this->setBaseLoggerAdapter($loggerAdapter);
    }

    public function setFileLoggerAdapter()
    {
        $fileLoggerAdapter = new FileLoggerAdapter(public_path('log.txt'));

        $this->setBaseLoggerAdapter($fileLoggerAdapter);
    }
}
