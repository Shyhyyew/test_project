<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id): JsonResponse
    {
        Data::findOrFail($id)->delete();

        return $this->response();
    }
}
