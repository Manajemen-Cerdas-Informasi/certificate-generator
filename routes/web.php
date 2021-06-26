<?php

use App\Http\Controllers\CertificateController;
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

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
    Route::view('home', 'home');

    Route::prefix('certificate')->name('certificate.')->group(function(){
        Route::get('', [CertificateController::class, 'index'])->name('index');
        Route::get('create', [CertificateController::class, 'create'])->name('create');
        Route::post('store', [CertificateController::class, 'store'])->name('store');
        Route::get('{certificate_id}/edit', [CertificateController::class, 'edit'])->name('edit');
        Route::put('{certificate_id}/update', [CertificateController::class, 'update'])->name('update');
        Route::delete('delete', [CertificateController::class, 'delete'])->name('delete');
    });

});
