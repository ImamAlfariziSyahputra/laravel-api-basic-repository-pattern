<?php

use App\Http\Controllers\StudentsCoursesEnrollmentsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/enrollments/{id}', [StudentsCoursesEnrollmentsController::class, 'get']);
    Route::post('/enrollments', [StudentsCoursesEnrollmentsController::class, 'update']);
    Route::delete('/enrollments/{id}', [StudentsCoursesEnrollmentsController::class, 'softDelete']);
});
