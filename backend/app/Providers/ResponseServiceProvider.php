<?php

namespace App\Providers;

use App\Services\Log\LogService;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory, LogService $logService)
    {
        $factory->macro('success', function ($data = null, $message = '', $statusCode = null) use ($factory, $logService) {
            $statusCode = $statusCode ?? 200;

            $response = [
                'statusCode' => $statusCode,
                'message' => $message,
                'data' => $data,
            ];

            $logService->logInfo('Success response: '.json_encode($response));

            return $factory->json($response, $statusCode);
        });

        $factory->macro('error', function (array $errors = [], $message = '', $statusCode = null) use ($factory, $logService) {
            $statusCode = $statusCode ?? 500;

            $response = [
                'statusCode' => $statusCode,
                'message' => $message,
                'errors' => $errors,
            ];

            $logService->logInfo('Error response: '.json_encode($response));

            return $factory->json($response, $statusCode);
        });
    }
}
