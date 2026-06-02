<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/menus', [MenuController::class, 'index'])->name('api.menus.index');
Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('api.menus.show');

Route::get('/pages', [PageController::class, 'index'])->name('api.pages.index');
Route::get('/pages/{page}', [PageController::class, 'show'])->name('api.pages.show');

Route::get('/events', [EventController::class, 'index'])->name('api.events.index');
Route::get('/catering-events', [EventController::class, 'catering'])->name('api.events.catering');
Route::get('/events/{event}', [EventController::class, 'show'])->name('api.events.show');


