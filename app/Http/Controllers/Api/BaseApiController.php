<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    protected function success($data, $status = 200, $message = 'success'): JsonResponse
    {
        $responseData = [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
        return new JsonResponse($responseData, $status);
    }

    protected function error($data, $status = 500, $message = 'error'): JsonResponse
    {
        $responseData = [
            'success' => false,
            'data' => $data,
            'message' => $message,
        ];
        return new JsonResponse($responseData, $status);
    }
}
