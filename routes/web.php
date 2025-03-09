<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/dealer', [DealerController::class, 'index'])->name('admin.dealer.index');
Route::get('/admin/dealer/getData', [DealerController::class, 'getData'])->name('admin.dealer.getData');
Route::get('/admin/dealer/create', [DealerController::class, 'create'])->name('admin.dealer.create');
Route::post('/admin/dealer/store', [DealerController::class, 'store'])->name('admin.dealer.store');
Route::post('/admin/dealer/delete/{id}', [DealerController::class, 'delete'])->name('admin.dealer.delete');
