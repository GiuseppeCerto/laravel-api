<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/works', [WorkController::class, 'index']);

Route::get('/works/{slug}', [WorkController::class, 'show']);

Route::get('/test', function () {
    return response()->json([
        'name' => 'Giuseppe',
        'role' => 'admin'
    ]);
});