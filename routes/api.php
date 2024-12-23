<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forapi\AuthenticationController;
use App\Http\Controllers\Forapi\UserManageController;
use App\Http\Controllers\Forapi\EditController;
use App\Http\Controllers\Forapi\TempController;

// 1|0M9kUKFdVzGgFxxOIRRdqRALifceYiY6nBsBwdnW

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::post('/password/email', [AuthenticationController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [AuthenticationController::class, 'resetPassword']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [UserManageController::class, 'edit']);
    Route::put('/user', [UserManageController::class, 'update']);
});

Route::get('/pages/{id}/load-project', [EditController::class, 'loadProjectApi'])->name('pages.loadProjectApi');
Route::patch('/pages/{id}/store-project', [EditController::class, 'storeProjectApi'])->name('pages.storeProjectApi');

Route::get('/template/{id}/load-project', [TempController::class, 'loadProjectApi'])->name('template.loadProjectApi');
Route::patch('/template/{id}/store-project', [TempController::class, 'storeProjectApi'])->name('template.storeProjectApi');
// Route::patch('/temp-use/{id}/store-project', [TempController::class, 'storeProjectPageApi'])->name('template.storeProjectApi');

