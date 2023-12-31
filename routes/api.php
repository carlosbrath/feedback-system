<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
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
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/interactions', [InteractionController::class, 'store']);
    Route::get('/', [FeedbackController::class, 'index']);
    Route::apiResource('feedback', FeedbackController::class);
    Route::post('/feedback/upvote', [FeedbackController::class, 'upvote'])->name('feedback.upvote');

});
