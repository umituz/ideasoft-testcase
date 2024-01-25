<?php

namespace App\Services\Adapters\Log;

class FileLoggerAdapter
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function logError($data): void
    {
        file_put_contents($this->filePath, "Error: {$data['message']}\n", FILE_APPEND);
    }

    public function logInfo($data): void
    {
        file_put_contents($this->filePath, "Info: {$data['message']}\n", FILE_APPEND);
    }
}
