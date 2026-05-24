<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [DashboardController::class, 'indexEvent'])->name('events.index');
    Route::get('/transactions', [DashboardController::class, 'indexTransaction'])->name('transactions.index');
    Route::get('events', [AdminEventController::class, 'index'])->name('events.index');
    Route::get('events/create', [AdminEventController::class, 'create'])->name('events.create');
    Route::post('events/store', [AdminEventController::class, 'store'])->name('events.store');
    Route::delete('events/destroy/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/edit/{event}', [AdminEventController::class, 'edit'])->name('events.edit');
    Route::put('events/update/{event}', [AdminEventController::class, 'update'])->name('events.update');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
    // dan seterusnya...
});
