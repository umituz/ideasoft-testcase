<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Trait ApiResponse
 */
trait ApiResponse
{
    public function ok($data, $message = null): JsonResponse
    {
        $message = $message ?? __('Your execution has been completed successfully');

        return response()->success($data, __($message), Response::HTTP_OK);
    }

    public function created($data, $message = null): JsonResponse
    {
        $message = $message ?? __('Your execution has been completed successfully');

        return response()->success($data, __($message), Response::HTTP_CREATED);
    }

    public function noContent($data, $message = null): JsonResponse
    {
        $message = $message ?? __('Your execution has been completed successfully');

        return response()->success($data, __($message), Response::HTTP_NO_CONTENT);
    }
}
