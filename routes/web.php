<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BorrowerController;
use App\Http\Controllers\BookController as UserBookController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BorrowRecordController;

// 🌐 Public Routes
Route::get('/', [WelcomeController::class, 'welcome'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// 🔐 Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Book Viewing & Borrowing
    Route::get('/books', [UserBookController::class, 'index'])->name('books.index');
    Route::get('/books/search', [UserBookController::class, 'search'])->name('books.search');
    Route::post('/books/{book}/borrow', [UserBookController::class, 'borrow'])->name('books.borrow');

    // Borrow Book
    Route::get('/borrow/create', [BorrowRecordController::class, 'create'])->name('borrow.create');
    Route::post('/borrow', [BorrowRecordController::class, 'store'])->name('borrow.store');

    // Return Book
    Route::get('/borrow/return', [BorrowRecordController::class, 'returnForm'])->name('borrow.return.form');
    Route::post('/borrow/return', [BorrowRecordController::class, 'returnBook'])->name('borrow.return');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🛡️ Admin Routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('books', AdminBookController::class);
    Route::resource('borrowers', BorrowerController::class);
});

// ❌ Fallback 404 Page
Route::fallback(fn () => response()->view('errors.404', [], 404));

// 🔑 Breeze Auth Routes
require __DIR__ . '/auth.php';
