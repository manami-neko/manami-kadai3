<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightLogController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeightTargetController;


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


    Route::post('/weight_logs/create', [WeightLogController::class, 'store']);
    Route::get('/weight_logs/search', [WeightLogController::class, 'search']);
    Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'show']);
    Route::post('/weight_logs/{weightLogId}/update', [WeightTargetController::class, 'update']);
    Route::put('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);
    Route::get('/goal_setting', [WeightTargetController::class, 'target']);
    Route::post('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'delete']);
});
