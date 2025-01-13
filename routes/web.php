<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\UserProfileController;
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


Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{slug}/calculate', [CalculatorController::class, 'show'])->name('calculator.show');

Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('plans/{plan}/register', [PlanController::class, 'register'])->name('plans.register');
Route::post('plans/{plan}/register', [PlanController::class, 'processRegister'])->name('plans.processRegister');

Route::get('quotation/generate',[QuotesController::class,'generateQuotation'])->name('quotation.generate');

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {

    Route::get('plans/{plan}/pay', [PlanController::class, 'payView'])->name('plans.pay');

    Route::post('plans/success', [PlanController::class, 'success'])->name('plans.success');

    Route::post('profile/cancel-subscription', [UserProfileController::class, 'cancelSubscription'])->name('profile.cancelSubscription');
    Route::resource('profile', UserProfileController::class)->only(['index', 'update']);

});


Route::post('/ckeditor/upload', [FileUploadController::class, 'upload'])->name('ckeditor.upload');

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('users', AdminUserController::class);

    Route::resource('blogs', AdminBlogController::class);

});
