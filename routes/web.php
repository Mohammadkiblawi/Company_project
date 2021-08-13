<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [UserController::class, 'index'])->name('home');



// Route::get('/project', [ProjectController::class, 'index'])->name('index');
Route::resource('projects', ProjectController::class);
Route::get('/project/create', [ProjectController::class, 'create']);
Route::get('/project/{{project}}/edit', [ProjectController::class, 'edit']);
