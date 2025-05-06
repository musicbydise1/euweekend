<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController as PublicProgramController;
use App\Http\Controllers\Admin\ProgramCategoryController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Публичные страницы
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
//Route::get('/programs', [PageController::class, 'programs'])->name('programs');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/education', [PageController::class, 'education'])->name('education');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');

// Список программ
Route::get('/programs', [PublicProgramController::class, 'index'])
    ->name('public.programs.index');

// Детальная страница программы
Route::get('/programs/{slug}', [PublicProgramController::class, 'show'])
    ->name('public.programs.show');

//Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


// Админ-панель (доступна только авторизованным администраторам)
//Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//    Route::resource('pages', AdminPageController::class);
//        Route::resource('program_categories', ProgramCategoryController::class);
//    Route::resource('programs', ProgramController::class);
//    Route::resource('days', DayController::class);
//});


require __DIR__ . '/auth.php';
