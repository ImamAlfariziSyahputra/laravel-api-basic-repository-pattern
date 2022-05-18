<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/students/{id}', [StudentsController::class, 'get']);
    Route::post('/students', [StudentsController::class, 'update']);
    Route::delete('/students/{id}', [StudentsController::class, 'softDelete']);
});
