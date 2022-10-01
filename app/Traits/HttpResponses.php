<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses
{
    /**
     * Success Response Method
     *
     * @param array $data
     * @param string $messsage
     * @param int $code
     *
     * @return JsonResponse
     */
    protected function success(
        $data,
        $messsage = null,
        $code = 200
    ): JsonResponse {
        return response()->json(
            [
                'status' => 'Request was successful.',
                'message' => $messsage,
                'data' => $data
            ],
            $code
        );
    }

    /**
     * Error Reponse Method
     *
     * @param array $data
     * @param string $messsage
     * @param int $statusCode
     *
     * @return JsonResponse
     */
    protected function error(
        $data,
        $messsage = null,
        $statusCode,
    ): JsonResponse {
        return response()->json(
            [
                'status' => 'Error has occurred.',
                'message' => $messsage,
                'data' => $data
            ],
            $statusCode
        );
    }
}