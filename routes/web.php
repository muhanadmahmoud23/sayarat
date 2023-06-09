<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeTasksController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('employee', EmployeeController::class, ['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
    Route::resource('department', DepartmentController::class, ['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
    Route::resource('task', TasksController::class, ['only' => ['index', 'create', 'store']]);

    Route::resource('employee_task', EmployeeTasksController::class, ['only' => ['index', 'edit', 'update']]);
    Route::post('updateStatus/{id}', [EmployeeTasksController::class, 'updateStatus'])->name('updateStatus');
});
