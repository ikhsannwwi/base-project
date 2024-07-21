<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LogSystemController;
use App\Http\Controllers\admin\UserGroupController;
use App\Http\Controllers\admin\ModuleManagementController;





Route::get('login', [AuthController::class, 'index'])->name('admin.auth.login');
Route::post('auth/login', [AuthController::class, 'process'])->name('admin.auth.login.process');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('account/{uuid}/overview', [AccountController::class, 'overview'])->name('admin.account');
    Route::get('account/{uuid}/settings', [AccountController::class, 'settings'])->name('admin.account.settings');
    Route::put('account/{uuid}/settings/update', [AccountController::class, 'updateSettings'])->name('admin.account.settings.update');
    Route::get('account/{uuid}/security', [AccountController::class, 'security'])->name('admin.account.security');
    Route::get('account/{uuid}/activity', [AccountController::class, 'activity'])->name('admin.account.activity');
    Route::get('account/{uuid}/logs', [AccountController::class, 'logs'])->name('admin.account.logs');

    //Menus
    Route::get('menus', [MenuController::class, 'index'])->name('admin.menus');
    Route::get('menus/get-data', [MenuController::class, 'getData'])->name('admin.menus.getData');
    Route::get('menus/add', [MenuController::class, 'add'])->name('admin.menus.add');
    Route::post('menus/store', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::get('menus/edit/{id}', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::put('menus/update', [MenuController::class, 'update'])->name('admin.menus.update');
    Route::get('menus/destroy', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
    Route::post('menus/update-row-order', [MenuController::class, 'updateRowOrder'])->name('admin.menus.updateRowOrder');
    Route::post('menus/change-status', [MenuController::class, 'changeStatus'])->name('admin.menus.changeStatus');

    //Module Managements
    Route::get('module-managements', [ModuleManagementController::class, 'index'])->name('admin.module_managements');
    Route::get('module-managements/get-data', [ModuleManagementController::class, 'getData'])->name('admin.module_managements.getData');
    Route::get('module-managements/add', [ModuleManagementController::class, 'add'])->name('admin.module_managements.add');
    Route::post('module-managements/store', [ModuleManagementController::class, 'store'])->name('admin.module_managements.store');
    Route::get('module-managements/edit/{id}', [ModuleManagementController::class, 'edit'])->name('admin.module_managements.edit');
    Route::put('module-managements/update', [ModuleManagementController::class, 'update'])->name('admin.module_managements.update');
    Route::get('module-managements/destroy', [ModuleManagementController::class, 'destroy'])->name('admin.module_managements.destroy');
    Route::get('module-managements/destroy-access', [ModuleManagementController::class, 'destroyAccess'])->name('admin.module_managements.destroyAccess');
    Route::post('module-managements/update-row-order', [ModuleManagementController::class, 'updateRowOrder'])->name('admin.module_managements.updateRowOrder');
    Route::post('module-managements/get-detail', [ModuleManagementController::class, 'getDetail'])->name('admin.module_managements.getDetail');
    Route::get('module-managements/get-data-menu', [ModuleManagementController::class, 'getDataMenu'])->name('admin.module_managements.getDataMenu');

    //user groups
    Route::get('user-groups', [UserGroupController::class, 'index'])->name('admin.user_groups');
    Route::get('user-groups/get-data', [UserGroupController::class, 'getData'])->name('admin.user_groups.getData');
    Route::get('user-groups/add', [UserGroupController::class, 'add'])->name('admin.user_groups.add');
    Route::post('user-groups/store', [UserGroupController::class, 'store'])->name('admin.user_groups.store');
    Route::get('user-groups/edit/{id}', [UserGroupController::class, 'edit'])->name('admin.user_groups.edit');
    Route::put('user-groups/update', [UserGroupController::class, 'update'])->name('admin.user_groups.update');
    Route::get('user-groups/destroy', [UserGroupController::class, 'destroy'])->name('admin.user_groups.destroy');
    Route::post('user-groups/get-detail', [UserGroupController::class, 'getDetail'])->name('admin.user_groups.getDetail');
    Route::post('user-groups/check-name', [UserGroupController::class, 'checkName'])->name('admin.user_groups.checkName');
    Route::post('user-groups/change-status', [UserGroupController::class, 'changeStatus'])->name('admin.user_groups.changeStatus');

    //users
    Route::get('users', [UserController::class, 'index'])->name('admin.users');
    Route::get('users/get-data', [UserController::class, 'getData'])->name('admin.users.getData');
    Route::get('users/add', [UserController::class, 'add'])->name('admin.users.add');
    Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('users/get-data-user-group', [UserController::class, 'getDataUserGroup'])->name('admin.users.getDataUserGroup');
    Route::post('users/check-email', [UserController::class, 'checkEmail'])->name('admin.users.checkEmail');
    Route::post('users/check-telephone', [UserController::class, 'checkTelephone'])->name('admin.users.checkTelephone');
    Route::post('users/get-detail', [UserController::class, 'getDetail'])->name('admin.users.getDetail');
    Route::post('users/change-status', [UserController::class, 'changeStatus'])->name('admin.users.changeStatus');

    //Log Systems
    Route::get('log-systems', [LogSystemController::class, 'index'])->name('admin.log_systems');
    Route::get('log-systems/get-data', [LogSystemController::class, 'getData'])->name('admin.log_systems.getData');
    Route::post('log-systems/get-detail', [LogSystemController::class, 'getDetail'])->name('admin.log_systems.getDetail');
    Route::get('log-systems/get-data-user', [LogSystemController::class, 'getDataUser'])->name('admin.log_systems.getDataUser');
    Route::get('log-systems/get-data-module', [LogSystemController::class, 'getDataModule'])->name('admin.log_systems.getDataModule');
    Route::get('log-systems/export-excel', [LogSystemController::class, 'exportExcel'])->name('admin.log_systems.exportExcel');
    Route::get('log-systems/export-pdf', [LogSystemController::class, 'exportPdf'])->name('admin.log_systems.exportPdf');
    Route::get('log-systems/export-detail-excel', [LogSystemController::class, 'exportDetailExcel'])->name('admin.log_systems.exportDetailExcel');
    Route::get('log-systems/export-detail-pdf', [LogSystemController::class, 'exportDetailPdf'])->name('admin.log_systems.exportDetailPdf');
});
