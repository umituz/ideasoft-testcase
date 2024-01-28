<?php

namespace App\Traits;

/**
 * Trait NotifyUser
 */
trait Logger
{
    private $loggerAdapter;

    /**
     * @param  mixed  $loggerAdapter
     *
     * @throws \InvalidArgumentException
     */
    public function setBaseLoggerAdapter($loggerAdapter): void
    {
        if (! method_exists($loggerAdapter, 'logError') ||
            ! method_exists($loggerAdapter, 'logInfo')
        ) {
            throw new \InvalidArgumentException(__('Invalid logger adapter provided!'));
        }

        $this->loggerAdapter = $loggerAdapter;
    }

    public function logError($exception): void
    {
        $this->loggerAdapter->logError([
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
        ]);
    }

    public function logInfo($message): void
    {
        $this->loggerAdapter->logInfo(['message' => $message]);
    }
}
