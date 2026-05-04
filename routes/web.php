<?php

use App\Http\Controllers\Frontend\ContactSubmissionController;
use App\Http\Controllers\Frontend\CareerSubmissionController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
// Single Pages
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/insights', [PageController::class, 'insights'])->name('insights');
Route::get('/industries', [PageController::class, 'industries'])->name('industries');
Route::get('/technology', [PageController::class, 'technology'])->name('technology');
Route::get('/casestudy', [PageController::class, 'casestudy'])->name('casestudy');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('termsOfService');
Route::post('/contact', [ContactSubmissionController::class, 'store'])->name('contact.submit');
Route::get('/contact/thank-you', [ContactSubmissionController::class, 'thankYou'])->name('contact.thank-you');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// CMS Pages
Route::get('/services/{service:slug}', [PageController::class, 'service'])->name('services.show');
Route::get('/insights/{insight:slug}', [PageController::class, 'insight'])->name('insights.show');
Route::get('/casestudy/{caseStudy:slug}', [PageController::class, 'caseStudyShow'])->name('casestudy.show');
Route::get('/careers/thank-you', [CareerSubmissionController::class, 'thankYou'])->name('careers.thank-you');
Route::get('/careers/{career:slug}', [PageController::class, 'careerShow'])->name('careers.show');
Route::get('/careers/{career:slug}/apply', [PageController::class, 'careerApply'])->name('careers.apply');
Route::post('/careers/{career:slug}/apply', [CareerSubmissionController::class, 'store'])->name('careers.apply.submit');

// Event Routes
Route::get('/events/{event}/register', [PageController::class, 'eventRegistration'])->name('events.register');
Route::post('/events/{event}/register', [PageController::class, 'storeEventRegistration'])->name('events.register.submit');
