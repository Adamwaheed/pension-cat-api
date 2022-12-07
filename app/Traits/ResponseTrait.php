<?php

namespace App\Traits;

trait ResponseTrait
{

    public function success($data, $message,$code=200): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'data' => $data,
                'message' => $message,
            ],
            $code
        );
    }

    public function notFound($message): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => $message],404);
    }

    public function error($message): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message' => $message],409);
    }
}
