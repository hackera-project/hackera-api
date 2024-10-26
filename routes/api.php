<?php

use App\Http\Controllers\V1\AssetController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CompanyController;
use App\Http\Controllers\V1\ProgramController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('companies', [CompanyController::class, 'store']);

    Route::middleware('auth:sanctum')-> group(function() {
        Route::get('/auth/me', [AuthController::class, 'me']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::apiResource('companies', CompanyController::class)->except('store');

        Route::apiResource('programs', ProgramController::class);

        Route::apiResource('programs/{program}/assets', AssetController::class)->except('show');
    });
});
