<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/{listing:slug}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/{listing:slug}/apply', [ListingController::class, 'apply'])->name('listing.apply');
