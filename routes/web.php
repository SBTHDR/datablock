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

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    return view('dashboard', [
        'listings' => $request->user()->listings
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [ListingController::class, 'index'])->name('listing.index');
Route::get('/new', [ListingController::class, 'create'])->name('listing.create');
Route::post('/new', [ListingController::class, 'store'])->name('listing.store');
Route::get('/{listing:slug}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/{listing:slug}/apply', [ListingController::class, 'apply'])->name('listing.apply');
