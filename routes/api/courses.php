<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/courses/{id}', [CoursesController::class, 'get']);
    Route::post('/courses', [CoursesController::class, 'update']);
    Route::delete('/courses/{id}', [CoursesController::class, 'softDelete']);
});
