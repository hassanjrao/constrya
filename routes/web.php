<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {

    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('users', AdminUserController::class);
});
