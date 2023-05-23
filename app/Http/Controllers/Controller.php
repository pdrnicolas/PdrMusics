<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseError(
        string $errorMessage,
        int $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY
    ): JsonResponse {
        return response()->json([
            'message' => $errorMessage
        ], $statusCode);
    }
}
