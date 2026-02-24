<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('books.index')
        : redirect()->route('login');
});


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');

    Route::post('login', [AuthController::class, 'login'])->name('login.process');
    Route::post('register', [AuthController::class, 'register'])->name('register.process');
});


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

    // RETURN BUKU (pakai method yang benar)
    Route::post('/transactions/{transaction}/return',
        [TransactionController::class, 'returnBook'])
        ->name('transactions.return');
});


Route::middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::resource('books', BookController::class)->except(['index']);
    Route::resource('users', UserController::class);
    Route::resource('transactions', TransactionController::class)->except(['index']);
});


Route::middleware(['auth', 'checkRole:member'])->group(function () {

    Route::post('/books/{book}/borrow',
        [BookController::class, 'borrow'])
        ->name('transactions.borrow');
});