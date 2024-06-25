<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeGoalController;

Route::post('/employee-goals', [EmployeeGoalController::class, 'store']);

