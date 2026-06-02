<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

/**
 * class BaseController
 */
#[OA\Info(
    version: '1.0.0',
    title: 'Masala House API',
)]
#[OA\Get(
    path: '/api/masala-house',
    operationId: 'getSetting',
    description: 'Returns the masala house.',
    summary: 'Get masala house',
    tags: ['Masala House'],
    responses: [
        new OA\Response(response: 200, description: 'Masala house returned.'),
        new OA\Response(response: 401, description: 'Masala house not found.'),
    ],
)]
class BaseController extends Controller
{
    public function jsonResponse(array $data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function jsonResponseError(string $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], Response::HTTP_OK);
    }


}
