<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MealReminderController;
use App\Http\Controllers\API\SleepReminderController;
use App\Http\Controllers\API\LightActivityReminderController;
use App\Http\Controllers\API\HealthCheckupReminderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('meal-reminders', MealReminderController::class);
    Route::resource('sleep-reminders', SleepReminderController::class);
    Route::resource('light-activity-reminders', LightActivityReminderController::class);
    Route::resource('health-checkup-reminders', HealthCheckupReminderController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
