<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke(DataRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $data = auth()->user()->data()->create(['json' => $validated['data']]);

        $time = calculateExecutionTime();
        $size = DB::table('data')->select(DB::raw('SUM(LENGTH(json)) as size'))->first()->size;

        return $this->response([
            'execution_time' => $time,
            'id' => $data->id,
            'used_space' => formatBytes($size)
        ]);
    }
}
