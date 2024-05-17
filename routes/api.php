<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ApprehensionController;
use App\Http\Controllers\Api\UserController;
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

Route::prefix('user')->group(function () {
    require 'user/authenticated.php';
    require 'user/unauthenticated.php';
});

Route::post('violator', [ApprehensionController::class, 'violator_create']);
Route::post('establishment', [ApprehensionController::class, 'establishment_create']);
Route::post('public', [ApprehensionController::class, 'pc_create']);
Route::post('userRegister', [UserController::class, 'store']);

Route::get('get_violators', [ApprehensionController::class, 'getViolators']);
Route::get('get_establishments', [ApprehensionController::class, 'getEstablishments']);
Route::get('get_public_conveyances', [ApprehensionController::class, 'getPublicConveyances']);
Route::get('generate_report', [ApprehensionController::class, 'generateReport']);

Route::get('fetch_barangay', [ApprehensionController::class, 'fetchBarangay']);