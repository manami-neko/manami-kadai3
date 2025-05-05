<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware(['registered'])->group(
    function () {
        Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    }
);

Route::middleware(['auth'])->group(function () {
    Route::get('/weight_logs', [UserController::class, 'index']);

    Route::post('/register/step1', [UserController::class, 'step1']);
    Route::get('/register/step1', [UserController::class, 'showStep1']);
    Route::post('/register/step2', [UserController::class, 'step2']);
    Route::get('/register/step2', [UserController::class, 'showStep2']);
    Route::post('/weight_logs/create', [UserController::class, 'store']);
    Route::get('/weight_logs/search', [UserController::class, 'search']);
    Route::get('/weight_logs/{weightLogId}', [UserController::class, 'show']);
    Route::post('/weight_logs/{weightLogId}/update', [UserController::class, 'update']);
    Route::get('/wight_logs/goal_setting', [UserController::class, 'target']);
    Route::post('/weight_logs/{weightLogId}/delete', [UserController::class, 'delete']);
});
