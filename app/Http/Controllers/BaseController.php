<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * class BaseController
 */
class BaseController extends Controller
{
    public function jsonResponse(
        bool $success,
        string $message,
        int $status_code = Response::HTTP_OK,
        array $data = []): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ], $status_code);
    }
}
