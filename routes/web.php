<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MencobaController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

Route::get('/', function () {
    return view('welcome').redirect('/dashboard');
});

Route::get('/about', function () {
    return view('about', [
        "name" => "Muhammad Rizky Aziz",
        "email" => "muhammadrizkyaziz1404@mail.ugm.ac.id"
    ]);
});

Route::get('/boom', [MencobaController::class, 'boomesport']);

Route::get('/prx', [MencobaController::class, 'prxesport']);

Route::get('/fnatic', [MencobaController::class, 'fnaticesport']);

Route::get('/fpx', [MencobaController::class, 'fpxesport']);

// Route::get('/', [MencobaController::class, 'beranda']);

Route::get('/buku', [BukuController::class, 'index'])->middleware(['auth', 'verified'])->name('buku');

Route::get('/buku/create', [BukuController::class, 'create'])->middleware(['auth', 'verified'])->name('buku.create');

Route::post('/buku/store', [BukuController::class, 'store'])->middleware(['auth', 'verified'])->name('buku.store');

Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->middleware(['auth', 'verified'])->name('buku.destroy');

Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->middleware(['auth', 'verified'])->name('buku.edit');

Route::post('/buku/update/{id}', [BukuController::class, 'update'])->middleware(['auth', 'verified'])->name('buku.update');
