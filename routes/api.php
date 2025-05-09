<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\BlotterController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-citizens', [CitizenController::class, 'getCitizens']);
    Route::post('/add-citizen', [CitizenController::class, 'addCitizen']);
    Route::put('/edit-citizen/{id}', [CitizenController::class, 'editCitizen']);
    Route::delete('/delete-citizen/{id}', [CitizenController::class, 'deleteCitizen']);

    Route::get('/get-blotters', [BlotterController::class, 'getBlotters']);
    Route::post('/add-blotter', [BlotterController::class, 'addBlotter']);
    Route::put('/edit-blotter/{id}', [BlotterController::class, 'editBlotter']);
    Route::delete('/delete-blotter/{id}', [BlotterController::class, 'deleteBlotter']);

    Route::get('/get-reports', [ReportController::class, 'getReports']);
    Route::post('/add-report', [ReportController::class, 'addReport']);
    Route::put('/edit-report/{id}', [ReportController::class, 'editReport']);
    Route::delete('/delete-report/{id}', [ReportController::class, 'deleteReport']);



    Route::post('/logout', [AuthenticationController::class, 'logout']);
});