<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function response($data = [], $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        $data = [
            'success' => true,
            'data'    => $data
        ];

        return response()
            ->json($data, $status, $headers, $options);
    }
}
