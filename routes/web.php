<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TasksController::class);
