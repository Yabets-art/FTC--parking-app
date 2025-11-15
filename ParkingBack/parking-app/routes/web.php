<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CarSpaceController;
use App\Http\Controllers\ReservationController;
Route::get('/', function () {
    return view('layouts/admin');
});

// Route::post('/admin/login', [UserController::class, 'login']);

// routes/web.php


// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/approvals', [AdminController::class, 'approvals'])->name('admin.approvals');

    // Define routes for approving and rejecting car registrations
    Route::put('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::delete('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');
// });

// web.php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::get('car_spaces/create', [CarSpaceController::class, 'create'])->name('car_spaces.create');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::post('approvals/{id}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
});



Route::get('/reservations', [ReservationController::class, 'index'])->name('admin.reservations');
Route::get('/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::patch('/admin/users/{id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
Route::patch('/admin/users/{id}/reject', [UserController::class, 'reject'])->name('admin.users.reject');


//Car space management
Route::get('/admin/car-spaces', [CarSpaceController::class, 'index'])->name('admin.car_spaces');
Route::get('/admin/car_spaces', [CarSpaceController::class, 'index'])->name('admin.car_spaces.index');
Route::get('/admin/car_spaces/create', [CarSpaceController::class, 'create'])->name('admin.car_spaces.create');
Route::post('/admin/car_spaces', [CarSpaceController::class, 'store'])->name('admin.car_spaces.store');
Route::get('/admin/car_spaces/{id}/edit', [CarSpaceController::class, 'edit'])->name('admin.car_spaces.edit');
Route::put('/admin/car_spaces/{id}', [CarSpaceController::class, 'update'])->name('admin.car_spaces.update');
Route::delete('/admin/car_spaces/{id}', [CarSpaceController::class, 'destroy'])->name('admin.car_spaces.destroy');

//Reservation management
Route::get('admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
Route::post('admin/reservations/{id}/approve', [ReservationController::class, 'approve'])->name('admin.reservations.approve');
Route::post('admin/reservations/{id}/reject', [ReservationController::class, 'reject'])->name('admin.reservations.reject');

//Car management
Route::get('admin/cars', [CarController::class, 'index'])->name('admin.cars.index');