<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// posts routes
Route::group(['middleware' => ['auth:sanctum']], function () {
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthControlller::class, 'logout']);

    //BLOG CRUD
Route::resource('posts', PostController::class)->except(['create', 'edit']);
    // CRUD - TMS
    // Route::get('/tasks', [TaskController::class, 'index']);
    // Route::get('/tasks/{task}', [TaskController::class, 'show']);
    // Route::post('/tasks', [TaskController::class, 'store']);
    // Route::put('/tasks/{task}', [TaskController::class, 'update']);
    // Route::delete('/tasks/{task}', [TaskController::class, 'delete']);   
 
    });

Route::post('/signup', [AuthControlller::class, 'sign_up']);
Route::post('/login', [AuthControlller::class, 'login']);
Route::get('/user', [AuthControlller::class, 'index']);

