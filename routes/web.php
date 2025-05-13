<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', [homeController::class,'index'])->name('home');




Route::get('/songs', [SongController::class,'index'])->name('songs.index');
Route::get('/songs/{id}', [SongController::class,'show'])->name('songs.show')
->where('id','\d+');
Route::get('/songs/create', [SongController::class,'create'])->name('create');
Route::post('/songs/store', [SongController::class,'store'])->name('store');
Route::delete('/songs/{song}', [SongController::class,'destroy'])->name('songs.destroy');
Route::get('/songs/{song}/edit', [SongController::class,'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class,'update'])->name('songs.update');
Route::get('/songs/search', [SongController::class, 'search'])->name('songs.search');


Route::get('/playlist/create', [PController::class, 'search'])->name('songs.search');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('/notification',[NotificationController::class,'index']);

Route::get('/settings',[SettingsController::class,'index']);