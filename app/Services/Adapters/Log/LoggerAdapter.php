<?php

namespace App\Services\Adapters\Log;

use Illuminate\Support\Facades\Log;

class LoggerAdapter
{
    public function logError($data): void
    {
        Log::error(__('Error Message: ').$data['message']);
        Log::error(__('Error Code: ').$data['code']);
        Log::error(__('Error File: ').$data['file']);
        Log::error(__('Error Line: ').$data['line']);
    }

    public function logInfo($data): void
    {
        Log::info(__('Info Message: ').$data['message']);
    }
}
