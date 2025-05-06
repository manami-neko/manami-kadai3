<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightLogController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/register/step1', [UserController::class, 'step1']);

Route::get('/register/step2', [UserController::class, 'showStep2']);



Route::middleware(['auth'])->group(function () {

    Route::post('/register/step2', [UserController::class, 'step2']);



    Route::get('/weight_logs', [WeightLogController::class, 'index']);

    Route::post('/weight_logs/create', [UserController::class, 'store']);
    Route::get('/weight_logs/search', [UserController::class, 'search']);
    Route::get('/weight_logs/{weightLogId}', [UserController::class, 'show']);
    Route::post('/weight_logs/{weightLogId}/update', [UserController::class, 'update']);
    Route::get('/weight_logs/goal_setting', [UserController::class, 'target']);
    Route::post('/weight_logs/{weightLogId}/delete', [UserController::class, 'delete']);
});
