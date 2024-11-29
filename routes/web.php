<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;

// Registration and Login Routes
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [UserController::class, 'register']);  // Your controller's register method

Route::get('login', function () {
    return view('auth.login');
});

// Users Routes
Route::get('users', [UserController::class, 'getAllUsers'])->name('users.index');
Route::get('user/{id}', [UserController::class, 'getUserDetails'])->name('users.details');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

// Role Assignment Routes
// Role Assignment Routes
Route::get('/assign-role/{userId}', [UserController::class, 'showAssignRoleForm'])->name('user.assign-role'); // Show form
Route::post('/assign-role/{userId}', [RoleController::class, 'assignRole'])->name('user.assign-role.store'); // Store form

Route::post('/remove-role/{userId}', [RoleController::class, 'removeRole'])->name('user.remove-role');
Route::get('/remove-role/{userId}', [UserController::class, 'showRemoveRoleForm'])->name('user.remove-role'); // Show form

Route::get('/update-user/{userId}', [UserController::class, 'updateUserForm'])->name('user.update-user'); // Show form
Route::post('user/{id}', [UserController::class, 'update'])->name('user.update-user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
