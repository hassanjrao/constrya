<?php

use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminProviderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\FaciasCalculatorController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FlatRoofCalculatorController;
use App\Http\Controllers\MemoryCalculationController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PlafonCalculatorController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\SendToProviderController;
use App\Http\Controllers\SheetRockController;
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

Route::post('sheet-rock/calculate', [SheetRockController::class, 'calculate'])->name('sheet-rock.calculate');
Route::post('facias/calculate', [FaciasCalculatorController::class, 'calculate'])->name('facias.calculate');
Route::post('flat-roof/calculate', [FlatRoofCalculatorController::class, 'calculate'])->name('flat-roof.calculate');
Route::post('plafon/calculate', [PlafonCalculatorController::class, 'calculate'])->name('plafon.calculate');


Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {

    Route::get('plans/{plan}/pay', [PlanController::class, 'payView'])->name('plans.pay');

    Route::post('plans/success', [PlanController::class, 'success'])->name('plans.success');

    Route::post('profile/cancel-subscription', [UserProfileController::class, 'cancelSubscription'])->name('profile.cancelSubscription');
    Route::resource('profile', UserProfileController::class)->only(['index', 'update']);

    Route::get('memory-calculations',[MemoryCalculationController::class,'index'])->name('memory-calculations.index');
    Route::get('memory-calculations/facias',[MemoryCalculationController::class,'facias'])->name('memory-calculations.facias');
    Route::get('memory-calculations/flat-roof',[MemoryCalculationController::class,'flatRoof'])->name('memory-calculations.flat-roof');
    Route::get('memory-calculations/plafon',[MemoryCalculationController::class,'index'])->name('memory-calculations.plafon');

    Route::post('send-to-providers/sheet-rock',[SendToProviderController::class,'sendToProvidersSheetRock'])->name('send-to-providers.sheet-rock');
    Route::post('send-to-providers/facias',[SendToProviderController::class,'sendToProvidersFacias'])->name('send-to-providers.facias');


});


Route::post('/ckeditor/upload', [FileUploadController::class, 'upload'])->name('ckeditor.upload');

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource("profile", AdminProfileController::class)->only(["index", "update"]);

    Route::resource('users', AdminUserController::class);
    Route::resource('blogs', AdminBlogController::class);

    Route::resource('banners', AdminBannerController::class);


    Route::resource('providers', AdminProviderController::class);

});
