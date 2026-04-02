<?php

namespace App\Trait\Auth;

trait ApiResponse
{
    public function success($data, $code)
    {
        return response()->json([
            "success" => true,
            "data" => $data,
            "errors" => null,
        ], $code);
    }

    public function error($data, $code)
    {
        return response()->json([
            "success" => false,
            "data" => null,
            "errors" => $data,
        ], $code);
    }
}
