<?php

use App\Http\Controllers\V1\AssetController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CompanyController;
use App\Http\Controllers\V1\ProgramController;
use App\Http\Controllers\V1\ReportController;
use App\Http\Controllers\V1\ReportFeedbackController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('companies', [CompanyController::class, 'store']);

    Route::middleware('auth:sanctum')-> group(function() {
        Route::get('/auth/me', [AuthController::class, 'me']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::get('profile', [UserController::class, 'profile']);
        Route::put('profile', [UserController::class, 'updateProfile']);

        Route::apiResource('companies', CompanyController::class)->except('store');

        Route::apiResource('programs', ProgramController::class);

        Route::apiResource('programs/{program}/assets', AssetController::class)->except('show');

        Route::apiResource('reports', ReportController::class);

        // Route::get('reports/{report}/feedbacks', [ReportFeedbackController::class, 'index']);
        Route::post('reports/{report}/feedbacks', [ReportFeedbackController::class, 'store']);
    });
});
