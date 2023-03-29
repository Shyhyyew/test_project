<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::delete('/data/{id}/delete', 'DeleteController');
Route::middleware('auth:api')->group(function () {
    Route::match(['post', 'get'], '/data/create', 'CreateController');
    Route::match(['post', 'get'], '/data/{id}/update', 'UpdateController');
});
