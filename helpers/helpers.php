<?php

if (!function_exists('success')) {
    function success(array $data = [], int $status = 200): Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $status);
    }
}

if (!function_exists('error')) {
    function error(\Exception $e): Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]
        ], method_exists($e, 'getStatus') ? $e->getStatus() : 400);
    }
}
