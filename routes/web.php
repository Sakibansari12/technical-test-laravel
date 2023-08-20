<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/',[UserController::class, 'index'])->name('index');
Route::get('/user',[UserController::class, 'getuser'])->name('user');
Route::delete('/user/{user}',[UserController::class, 'destroy'])->name('delete');
Route::post('/submit-user', [UserController::class, 'create'])->name('submit-user');
