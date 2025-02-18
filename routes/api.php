<?php

// use App\Http\Controllers\;

use App\Http\Controllers\API\taskController;
use App\Http\Controllers\API\Usercontroller;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tasks', [taskController::class, 'store']);
    Route::get('/tasks', [taskController::class, 'showAll']);
    Route::put('/tasks/{id}', [taskController::class, 'update']);
    Route::delete('/tasks/{id}', [taskController::class, 'destroy']);
    Route::delete("/logout",  [Usercontroller::class, "logout"]);
});

Route::post("/register", [Usercontroller::class, "register"]);
Route::post("/login",  [Usercontroller::class, "login"]);
