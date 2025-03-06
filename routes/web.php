<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PublisherController;

// Main admin dashboard route
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Publisher management routes
Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store');
Route::put('/publishers/{publisher}', [PublisherController::class, 'update'])->name('publishers.update');
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy'])->name('publishers.destroy');

// Book management routes
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Public pages
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');

// Any other specific routes your application needs can be added here