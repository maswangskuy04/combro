<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ExperienceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/latihan', [CountController::class, 'index']);
Route::get('/penjumlahan', [CountController::class, 'jumlah'])->name('penjumlahan');
Route::get('/pengurangan', [CountController::class, 'kurang'])->name('pengurangan');
Route::get('/pembagian', [CountController::class, 'bagi'])->name('pembagian');
Route::get('/perkalian', [CountController::class, 'kali'])->name('perkalian');
Route::get('/modulus', [CountController::class, 'bagihasil'])->name('modulus');

Route::post('/storejumlah', [CountController::class, 'storejumlah'])->name('store_penjumlahan');
Route::post('/storekurang', [CountController::class, 'storekurang'])->name('store_pengurangan');
Route::post('/storebagi', [CountController::class, 'storebagi'])->name('store_pembagian');
Route::post('/storekali', [CountController::class, 'storekali'])->name('store_perkalian');
Route::post('/storemodulus', [CountController::class, 'storemodulus'])->name('store_modulus');

Route::get('/dashboard', function () {
    if (Auth::user()->id_level === 1) {
        return view('admin.dashboard');
    } elseif (Auth::user()->id_level === 2) {
        return view('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// dashboard Admin
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
//Profile
Route::get('admin/profile', [ProfController::class, 'index'])->name('profiles.index')->middleware(['auth', 'admin']);
Route::get('admin/profile/create', [ProfController::class, 'create'])->name('profiles.create')->middleware(['auth', 'admin']);
Route::post('admin/profile/store', [ProfController::class, 'store'])->name('profiles.store')->middleware(['auth', 'admin']);
Route::get('admin/profile/edit/{id}', [ProfController::class, 'edit'])->name('profiles.edit')->middleware(['auth', 'admin']);
Route::put('admin/profile/update/{id}', [ProfController::class, 'update'])->name('profiles.update')->middleware(['auth', 'admin']);
Route::delete('admin/profile/softdelete/{id}', [ProfController::class, 'softdelete'])->name('profiles.softdelete')->middleware(['auth', 'admin']);
Route::post('admin/profile/update-status/{id}', [ProfController::class, 'updatestatus'])->name('profiles.update-status');
Route::get('admin/profile/backup', [ProfController::class, 'backup'])->name('profiles.backup')->middleware(['auth', 'admin']);
Route::get('admin/profile/recovery/{id}', [ProfController::class, 'recovery'])->name('profiles.recovery')->middleware(['auth', 'admin']);
Route::get('admin/recycle/', [ProfController::class, 'recycle'])->name('profiles.recycle');
Route::get('admin/restore/{id}',[ProfController::class, 'restore'])->name('profiles.restore');
Route::delete('admin/destroy/{id}',[ProfController::class, 'destroy'])->name('profiles.destroy');
Route::get('profile/generate-pdf/{id}', [ProfController::class, 'show'])->name('profiles.generate-pdf');


//experiens
// Route::post('admin/experience/store', [ExperienceController::class, 'store'])->name('experience.store');
Route::get('admin/experience', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('admin/experience/create', [ExperienceController::class, 'create'])->name('experiences.create');
Route::post('admin/experience/store', [ExperienceController::class, 'store'])->name('experiences.store');
Route::get('admin/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('experiences.edit');
Route::post('admin/experience/update/{id}', [ExperienceController::class, 'update'])->name('experiences.update');
Route::delete('admin/experience/softdelete/{id}', [ExperienceController::class, 'softdelete'])->name('experiences.softdelete');
route::post('admin/experience/update-status/{id}',[ExperienceController::class, 'updatestatus'])->name('experiences.update-status');
Route::get('admin/experience/backup', [ExperienceController::class, 'backup'])->name('experiences.backup');
Route::get('admin/experience/recovery/{id}', [ExperienceController::class, 'recovery'])->name('experiences.recovery');
// //End Update dan softdelete
route::get('compro', [ContentController::class, 'index']);

// dashboard User
Route::get('user/dashboard', [HomeController::class, 'index_user'])->middleware(['auth', 'user']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/experience', [ExperienceController::class, 'edit'])->name('experience.edit');
    //     Route::patch('/experience', [ExperienceController::class, 'update'])->name('experience.update');
    //     Route::delete('/experience', [ExperienceController::class, 'destroy'])->name('experience.destroy');
    // });
});

require __DIR__ . '/auth.php';
