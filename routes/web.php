<?php

use Nakul\Routes\Web as Route;
use App\Controllers\HomeController;
use App\Controllers\PostController;



Route::get("/", [HomeController::class, 'all']);

Route::post("/store", [PostController::class, 'store']);

Route::post("/update", [PostController::class, 'update']);

Route::post("/delete", [PostController::class, 'delete']);

Route::post("/active-or-dactive", [PostController::class, 'activeOrDactive']);

Route::get("/active", [HomeController::class, 'active']);

Route::get("/completed", [HomeController::class, 'completed']);

Route::post("/clear-completed", [PostController::class, 'clearCompleted']);

