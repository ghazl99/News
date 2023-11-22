<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [App\Http\Controllers\api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\api\AuthController::class, 'register']);
    Route::post('/logout', [App\Http\Controllers\api\AuthController::class, 'logout']);
    Route::post('/refresh', [App\Http\Controllers\api\AuthController::class, 'refresh']);
    Route::get('/user-profile', [App\Http\Controllers\api\AuthController::class, 'userProfile']);
});
Route::get('role',[App\Http\Controllers\api\postController::class,'getRole'])->middleware('jwt.verify');
Route::get('meals/{meal}',[App\Http\Controllers\api\postController::class,'show']);
Route::get('mealsall',[App\Http\Controllers\api\postController::class,'showAll']);

Route::post('menu',[App\Http\Controllers\api\postController::class,'insertTypeMenu']);
Route::put('updateMenu/{id}',[App\Http\Controllers\api\postController::class,'update']);
Route::delete('deleteMenu/{id}',[App\Http\Controllers\api\postController::class,'delete']);