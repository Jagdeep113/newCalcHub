<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PageController;

// Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Calculator categories
Route::get('/calculators/{category}', [CalculatorController::class, 'category'])
    ->name('calculators.category')
    ->where('category', 'financial|fitness|math|converter');

// Individual calculators
Route::get('/calculator/{slug}', [CalculatorController::class, 'show'])
    ->name('calculator.show')
    ->where('slug', '[a-z-]+');

// Static pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/contact', 'pages.contact')->name('contact');

require __DIR__.'/settings.php';