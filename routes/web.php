<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;

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
})->middleware('language');

Route::middleware(['auth:sanctum', 'verified', 'language'])->get('/home', function () {
    return view('home');
})->name('home');



// Route::get('/project', [ProjectController::class, 'index'])->name('index');
Route::resource('projects', ProjectController::class)->middleware('language');
Route::get('/project/create', [ProjectController::class, 'create'])->middleware('language');
Route::get('/project/{{project}}/edit', [ProjectController::class, 'edit'])->middleware('language');
Route::get('/users', [EmailController::class, 'index'])->middleware('language');
Route::post('/users', [EmailController::class, 'store']);
Route::get('setlang/{language}', function ($lang) {
    if ($lang == "ar" || $lang == "en") {
        session(['language' => $lang]);
    } else {
        abort(404);
    }
    return redirect()->back();
});
Route::get('/create-mail', [EmailController::class, 'create']);
Route::post('/send-mail', [EmailController::class, 'storemail']);
