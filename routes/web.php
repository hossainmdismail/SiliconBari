<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/services/{service:slug}', [PageController::class, 'service'])->name('services.show');
Route::get('/insights/{insight:slug}', [PageController::class, 'insight'])->name('insights.show');
