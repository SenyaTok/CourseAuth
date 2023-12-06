<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CourseController::class,"index"]);

Route::get("/signin", [UserController::class,"signin"]);
Route::post("/signin", [UserController::class,"signin_valid"]);
Route::get("/signup", [UserController::class,"signup"]);
Route::post("/signup", [UserController::class,"signup_valid"]);
Route::get("/signout", [UserController::class,"signout"]);

Route::post("/enroll", [ApplicationController::class,"create_application"]);

Route::get("/admin", [AdminController::class,"index"]);

Route::post("/cours",[CourseController::class,"create_course"]);

Route::post("/category",[CourseController::class,"create_categories"]);

Route::get("/application/{id_application}/confirm", [ApplicationController::class,"confirm"]);

// Route::get