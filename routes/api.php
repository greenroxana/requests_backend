<?php

use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/device', [\App\Http\Controllers\DeviceRecordController::class, 'index']);
Route::post('/log', [\App\Http\Controllers\RecordRequestController::class, 'index']);
Route::get('/log', [\App\Http\Controllers\RecordRequestController::class, 'getAll']);


WebSocketsRouter::webSocket('/api/front', \App\MyCustomWebSocketHandler::class);
