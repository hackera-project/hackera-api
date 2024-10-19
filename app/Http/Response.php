<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\AbstractPaginator;

class Response
{
    /**
     * @param mixed $data
     * @param string $message
     */
    public static function success($data = [], $message = ''): JsonResponse
    {
        return response()->json([
            'result' => $data,
            'message' => $message,
        ]);
    }
    /**
     * @param Collection<array-key,mixed> $data
     */
    public static function successList(AbstractPaginator $data, string $class): JsonResponse
    {
        return response()->json([
            'result' => $class::collection($data)->response()->getData(),
            'message' => '',
        ]);
    }

    public static function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return response()->json([
            'result' => null,
            'message' => $message,
        ], 401);
    }

    public static function error(string $message = 'Error', int $status = 400): JsonResponse
    {
        return response()->json([
            'result' => null,
            'message' => $message,
        ], $status);
    }
}
