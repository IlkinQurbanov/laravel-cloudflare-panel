<?php
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PageRuleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Маршруты для управления аккаунтами Cloudflare
Route::resource('accounts', AccountController::class)->middleware(['auth']);

// Маршруты для управления доменами
Route::resource('accounts.domains', DomainController::class)->shallow()->middleware(['auth']);

// Маршруты для управления правилами Page Rules
Route::resource('domains.page-rules', PageRuleController::class)->shallow()->middleware(['auth']);

require __DIR__.'/auth.php';
