<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
    Route::get('/admin/service/getData', [ServiceController::class, 'getData'])->name('admin.service.getData');
    Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/admin/service/detail/{id}', [ServiceController::class, 'detail'])->name('admin.service.detail');
    Route::delete('/admin/service/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
    Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::post('/admin/service/addInformation/{id}', [ServiceController::class, 'addInformation'])->name('admin.service.addInformation');
    Route::post('/admin/service/selectMechanic/{id}', [ServiceController::class, 'selectMechanic'])->name('admin.service.selectMechanic');
    Route::post('/admin/service/storeDetail/{id}', [ServiceController::class, 'storeDetail'])->name('admin.service.storeDetail');
    Route::delete('/admin/service/deleteDetail/{id}', [ServiceController::class, 'deleteDetail'])->name('admin.service.deleteDetail');
    Route::post('/admin/service/onmywayService/{id}', [ServiceController::class, 'onmywayService'])->name('admin.service.onmywayService');
    Route::post('/admin/service/estimateService/{id}', [ServiceController::class, 'estimateService'])->name('admin.service.estimateService');
    Route::post('/admin/service/startService/{id}', [ServiceController::class, 'startService'])->name('admin.service.startService');
    Route::post('/admin/service/finalService/{id}', [ServiceController::class, 'finalService'])->name('admin.service.finalService');
    Route::post('/admin/service/finishService/{id}', [ServiceController::class, 'finishService'])->name('admin.service.finishService');


    Route::get('/admin/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/admin/customer/getData', [CustomerController::class, 'getData'])->name('admin.customer.getData');
    Route::get('/admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/admin/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::delete('/admin/customer/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');
    Route::get('/admin/customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/admin/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');

    Route::get('/admin/mechanic', [MechanicController::class, 'index'])->name('admin.mechanic.index');
    Route::get('/admin/mechanic/getData', [MechanicController::class, 'getData'])->name('admin.mechanic.getData');
    Route::get('/admin/mechanic/create', [MechanicController::class, 'create'])->name('admin.mechanic.create');
    Route::post('/admin/mechanic/store', [MechanicController::class, 'store'])->name('admin.mechanic.store');
    Route::delete('/admin/mechanic/{id}', [MechanicController::class, 'destroy'])->name('admin.mechanic.destroy');
    Route::get('/admin/mechanic/edit/{id}', [MechanicController::class, 'edit'])->name('admin.mechanic.edit');
    Route::post('/admin/mechanic/update/{id}', [MechanicController::class, 'update'])->name('admin.mechanic.update');
    Route::post('/admin/mechanic/reset-password/{id}', [MechanicController::class, 'resetPassword'])->name('admin.mechanic.resetPassword');

    Route::get('/admin/vehicle', [VehicleController::class, 'index'])->name('admin.vehicle.index');
    Route::get('/admin/vehicle/getData', [VehicleController::class, 'getData'])->name('admin.vehicle.getData');
    Route::get('/admin/vehicle/create', [VehicleController::class, 'create'])->name('admin.vehicle.create');
    Route::post('/admin/vehicle/store', [VehicleController::class, 'store'])->name('admin.vehicle.store');
    Route::delete('/admin/vehicle/{id}', [VehicleController::class, 'destroy'])->name('admin.vehicle.destroy');
    Route::get('/admin/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('admin.vehicle.edit');
    Route::post('/admin/vehicle/update/{id}', [VehicleController::class, 'update'])->name('admin.vehicle.update');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/product/getData', [ProductController::class, 'getData'])->name('admin.product.getData');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
});
