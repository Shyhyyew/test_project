<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Models\Data;
use Illuminate\Http\JsonResponse;

class CreateController extends Controller
{
    public function __invoke(DataRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = Data::create(['json' => $validated['data']]);
        $time = (microtime(true) -  LARAVEL_START) * 1000;

        return $this->response([
            'execution_time' => $time,
            'used_space' => $data,
            'id' => $data->id
        ]);
    }
}
