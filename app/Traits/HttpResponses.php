<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success(
        $data,
        $messsage = null,
        $code = 200
    ) {
        return response()->json([
            'status' => 'Request was successful.',
            'message' => $messsage,
            'data' => $data
        ], $code);
    }

    protected function error(
        $data,
        $messsage = null,
        $code
    ) {
        return response()->json([
            'status' => 'Error has occurred.',
            'message' => $messsage,
            'data' => $data
        ], $code);
    }
}