<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrative\AuthController;
use App\Http\Controllers\Administrative\MemberController;
use App\Http\Controllers\Administrative\ProjectController;
use App\Http\Controllers\Administrative\ImageSliderController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Administrative\HomeController as AdministrativeHomeController;
use App\Http\Controllers\SitemapController;

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
// web.php


Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    return redirect()->back()->with('success', 'Cache cleared');
})->name('clear.cache');

Route::get('/views-count', [FrontendHomeController::class, 'viewsCount'])->name('views.count');

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

Route::get('/about', [FrontendHomeController::class, 'about'])->name('about');

Route::get('/projects', [FrontendHomeController::class, 'projects'])->name('projects');

Route::get('/project/{project}', [FrontendHomeController::class, 'projectDetails'])->name('project.details');

Route::get('/services', [FrontendHomeController::class, 'services'])->name('services');

Route::get('/contact', [FrontendHomeController::class, 'contact'])->name('contact');

Route::post('/consult-store', [FrontendHomeController::class, 'consultStore'])->name('consult.store');

Route::post('/contact-store', [FrontendHomeController::class, 'contactStore'])->name('contact.store');

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('login', [AuthController::class, 'authenticate'])->name('login.post');

Route::namespace('Administrative')->middleware('auth')->prefix('administrative')->name('administrative.')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AdministrativeHomeController::class, 'index'])->name('dashboard');

    // Project
    Route::prefix('project')->group(function () {
        Route::get('/list', [ProjectController::class, 'index'])->name('project');

        Route::get('project-data', [ProjectController::class, 'data'])->name('project.data');

        Route::get('edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');

        Route::delete('delete/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

        Route::get('slider-image-delete', [ProjectController::class, 'sliderImageDestroy'])->name('slider.image.project.destroy');

        Route::get('create', [ProjectController::class, 'create'])->name('project.create');

        Route::post('create', [ProjectController::class, 'store'])->name('project.store');

        Route::put('update/{project}', [ProjectController::class, 'update'])->name('project.update');
    });

    // Slider Images
    Route::prefix('slider')->group(function () {
        Route::get('/list', [ImageSliderController::class, 'index'])->name('slider');

        Route::get('slider-data', [ImageSliderController::class, 'data'])->name('slider.data');

        Route::get('edit/{slider}', [ImageSliderController::class, 'edit'])->name('slider.edit');

        Route::delete('delete/{slider}', [ImageSliderController::class, 'destroy'])->name('slider.destroy');

        Route::get('slider-image-delete', [ImageSliderController::class, 'sliderImageDestroy'])->name('slider.image.project.destroy');

        Route::get('create', [ImageSliderController::class, 'create'])->name('slider.create');

        Route::post('create', [ImageSliderController::class, 'store'])->name('slider.store');

        Route::put('update/{slider}', [ImageSliderController::class, 'update'])->name('slider.update');

        Route::get('get-content', [ImageSliderController::class, 'getContent'])->name('slider.get.content');
    });

    // Team Members
    Route::prefix('member')->group(function () {
        Route::get('/list', [MemberController::class, 'index'])->name('member');

        Route::get('member-data', [MemberController::class, 'data'])->name('member.data');

        Route::get('edit/{member}', [MemberController::class, 'edit'])->name('member.edit');

        Route::delete('delete/{member}', [MemberController::class, 'destroy'])->name('member.destroy');

        Route::get('create', [MemberController::class, 'create'])->name('member.create');

        Route::post('create', [MemberController::class, 'store'])->name('member.store');

        Route::put('update/{member}', [MemberController::class, 'update'])->name('member.update');
    });
});
