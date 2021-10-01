<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/ui', 'ui.index');

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('parking', [\App\Http\Controllers\ParkingController::class, 'index'])->name('parking.index');
    Route::get('parking/checkin', [\App\Http\Controllers\ParkingController::class, 'checkin'])->name('parking.checkin');
    Route::get('parking/search/', [\App\Http\Controllers\ParkingController::class, 'search'])->name('parking.search');
    Route::get('parking/checkout/{consignemtno}', [\App\Http\Controllers\ParkingController::class, 'checkout'])->name('parking.checkout');
    Route::post('parking/store', [\App\Http\Controllers\ParkingController::class, 'store'])->name('parking.store');
    Route::patch('parking/update', [\App\Http\Controllers\ParkingController::class, 'update'])->name('parking.update');
    Route::get('parking/checkin/print/{consignmentno}', [\App\Http\Controllers\ParkingController::class, 'printCheckinReceipt'])->name('parking.checkin.print');
    Route::get('parking/checkout/print/{consignmentno}', [\App\Http\Controllers\ParkingController::class, 'printCheckoutReceipt'])->name('parking.checkout.print');


    Route::get('report/daily', [\App\Http\Controllers\ReportController::class, 'daily'])->name('report.daily');
    Route::get('report/monthly', [\App\Http\Controllers\ReportController::class, 'monthly'])->name('report.monthly');
    Route::get('report/datewise', [\App\Http\Controllers\ReportController::class, 'datewise'])->name('report.datewise');
});
