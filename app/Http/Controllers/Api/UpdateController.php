<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id): JsonResponse
    {
        $entity = auth()->user()->data()->findOrFail($id);
        $data = $entity->json;

        preg_match_all('/\$data.+?;/', $request->code, $matches);

        eval(implode($matches[0]));

        $entity->update(['json' => $data]);

        return $this->response([
            'execution_time' => calculateExecutionTime()
        ]);
    }
}
