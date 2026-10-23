<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalArtController;

/*
|--------------------------------------------------------------------------
| Web Routes - Aetheria Gallery (UTS Rekayasa Web)
|--------------------------------------------------------------------------
*/

Route::get('/', [DigitalArtController::class, 'index'])->name('artworks.index');
Route::get('/artworks', [DigitalArtController::class, 'index']);
Route::get('/artworks/{id}', [DigitalArtController::class, 'show'])->name('artworks.show');
Route::get('/about', [DigitalArtController::class, 'about'])->name('about');
