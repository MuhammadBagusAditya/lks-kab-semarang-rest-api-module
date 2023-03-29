<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\VaccinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// http://127.0.0.1:8000/api

Route::post("/v1/auth/login", [AuthController::class, "login"]);
Route::post("/v1/auth/logout/{token?}", [AuthController::class, "logout"]);

Route::middleware(["token"])->group(function () {
    Route::post("/v1/consultations/{token?}", [ConsultationController::class, "store"]);
    Route::get("/v1/consultations/{token?}", [ConsultationController::class, "show"]);

    Route::get("/v1/spots/{token?}", [SpotController::class, "index"]);
    Route::get("/v1/spots/{spot_id}/{token?}", [VaccinationController::class, "show"]);

    Route::get("/v1/vaccinations", [VaccinationController::class, "index"]);
});
