<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

// Home page (list of incomes and expenses)
Route::get('/', [IncomeSourceController::class, 'index'])->name('income.index');

// Income routes
Route::get('/income/create', [IncomeSourceController::class, 'create'])->name('income.create'); // Form to add income
Route::post('/income', [IncomeSourceController::class, 'store'])->name('income.store'); // Save income to the database
Route::delete('/income/{id}', [IncomeSourceController::class, 'destroy'])->name('income.destroy'); // Delete income

// Expense routes
Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create'); // Form to add expense
Route::post('/expense', [ExpenseController::class, 'store'])->name('expense.store'); // Save expense to the database
Route::delete('/expense/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy'); // Delete expense

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';
