<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::resource('tasks', TasksController::class);
