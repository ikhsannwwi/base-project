<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserGroupController;





Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//user group
Route::get('user-groups', [UserGroupController::class, 'index'])->name('admin.user_groups');
Route::get('user-groups/getData', [UserGroupController::class, 'getData'])->name('admin.user_groups.getData');
Route::get('user-groups/add', [UserGroupController::class, 'add'])->name('admin.user_groups.add');
Route::post('user-groups/store', [UserGroupController::class, 'store'])->name('admin.user_groups.store');
Route::get('user-groups/edit', [UserGroupController::class, 'edit'])->name('admin.user_groups.edit');
Route::put('user-groups/update', [UserGroupController::class, 'update'])->name('admin.user_groups.update');
Route::get('user-groups/destroy', [UserGroupController::class, 'destroy'])->name('admin.user_groups.destroy');

//user
Route::get('users', [UserController::class, 'index'])->name('admin.users');
Route::get('users/getData', [UserController::class, 'getData'])->name('admin.users.getData');
Route::get('users/add', [UserController::class, 'add'])->name('admin.users.add');
Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('users/update', [UserController::class, 'update'])->name('admin.users.update');
Route::get('users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');