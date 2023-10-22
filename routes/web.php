<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Login, Home Routes
// Middleware to prevent logged in user to access login, home pages
Route::middleware( ['prevent-authenticated'] )->group( function () {
    Route::get( '/', function () {
        return view( 'index' );
    } );
    Route::get( '/login', [LoginController::class, 'index'] )->name( 'login' );
    Route::post( '/login', [LoginController::class, 'login'] )->name( 'login' );
} );

// Routes for admin
Route::prefix( 'admin' )->name( 'admin.' )->group( function () {
    Route::middleware( ['auth', 'role:1'] )->group( function () {
        Route::get( '/user', [AdminUserController::class, 'showUser'] )->name( 'showUser' );
        // user registration
        Route::get( '/user/create', [AdminUserController::class, 'create'] )->name( 'user.create' );
        Route::post( '/user/store', [AdminUserController::class, 'store'] )->name( 'user.store' );

        // user update
        Route::get( '/user/edit/{id}', [AdminUserController::class, 'edit'] )->name( 'user.edit' );
        Route::post( '/user/update/{id}', [AdminUserController::class, 'update'] )->name( 'user.update' );

        // user delete
        Route::get( 'user/delete/{id}', [AdminUserController::class, 'delete'] )->name( 'user.delete' );

        // dashboard and logout
        Route::get( '/dashboard', [AdminController::class, 'dashboard'] )->name( 'dashboard' );
        Route::get( '/logout', [AdminController::class, 'logout'] )->name( 'logout' );
    } );
} );

// Routes for normal users
Route::prefix( 'user' )->name( 'user.' )->group( function () {
    Route::middleware( ['auth', 'role:0'] )->group( function () {
        Route::get( '/dashboard', [UserController::class, 'dashboard'] )->name( 'dashboard' );
        Route::get( '/logout', [UserController::class, 'logout'] )->name( 'logout' );

        Route::get( 'edit/profile', [UserController::class, 'edit'] )->name( 'edit' );
        Route::post( 'update/profile', [UserController::class, 'update'] )->name( 'update' );
    } );
} );
