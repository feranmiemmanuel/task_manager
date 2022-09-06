<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[PagesController::class, 'login'] )->name('login');
Route::get('/register',[PagesController::class, 'register'] )->name('register');
Route::post('/add-user',[UserController::class, 'addUser'] )->name('addUser');
Route::post('/login',[AuthController::class, 'authLogin'])->name('loginUser');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[PagesController::class, 'dashboard'] )->name('dashboard');
    Route::get('/activities',[PagesController::class, 'activities'] )->name('activities');
    Route::get('/view-user/{user}', [PagesController::class, 'viewUser'])->name('viewUser');
    Route::post('/assign-task', [TaskController::class, 'create'])->name('assignTask');
});
