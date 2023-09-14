<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;
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
Route::prefix('/admin')->namespace("Admin")->group(function (){

    Route::get("/",function (){
       return view("admin.pages.dashboard.index");
    })->name("admin.pages.dashboard.index");
    //admin category address url
    Route::prefix('category')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('admin.category.index');
        Route::get('/create' , [CategoryController::class , 'create'])->name('admin.category.create');
        Route::post('/store' , [CategoryController::class , 'store'])->name('admin.category.store');
        Route::get('/edit/{category}' , [CategoryController::class , 'edit'])->name('admin.category.edit');
        Route::put('/update/{category}' , [CategoryController::class , 'update'])->name('admin.category.update');
        Route::delete('/destroy/{id}' , [CategoryController::class , 'destroy'])->name('admin.category.destroy');
    });

    //admin post address url
    Route::prefix('post')->group(function(){
        Route::get('/' , [PostController::class , 'index'])->name('admin.post.index');
        Route::get('/create' , [PostController::class , 'create'])->name('admin.post.create');
        Route::post('/store' , [PostController::class , 'store'])->name('admin.post.store');
        Route::get('/edit/{post}' , [PostController::class , 'edit'])->name('admin.post.edit');
        Route::put('/update/{post}' , [PostController::class , 'update'])->name('admin.post.update');
        Route::delete('/destroy/{id}' , [PostController::class , 'destroy'])->name('admin.post.destroy');
        Route::get('/change-breaking-news/{posts}', [PostController::class , 'breakingNews'])->name('admin.post.breaking-news');
        Route::get('/change-selected/{posts}', [PostController::class , 'selected'])->name('admin.post.selected');
    });

    //admin banner address url
    Route::prefix('banner')->group(function(){
        Route::get('/' , [BannerController::class , 'index'])->name('admin.banner.index');
        Route::get('/create' , [BannerController::class , 'create'])->name('admin.banner.create');
        Route::post('/store' , [BannerController::class , 'store'])->name('admin.banner.store');
        Route::get('/edit/{banner}' , [BannerController::class , 'edit'])->name('admin.banner.edit');
        Route::put('/update/{banner}' , [BannerController::class , 'update'])->name('admin.banner.update');
        Route::delete('/destroy/{banner}' , [BannerController::class , 'destroy'])->name('admin.banner.destroy');

    });

    //admin user address url
    Route::prefix('user')->group(function(){
        Route::get('/' , [UserController::class , 'index'])->name('admin.user.index');
        Route::get('/create' , [UserController::class , 'create'])->name('admin.user.create');
        Route::post('/store' , [UserController::class , 'store'])->name('admin.user.store');
        Route::get('/edit/{user}' , [UserController::class , 'edit'])->name('admin.user.edit');
        Route::put('/update/{user}' , [UserController::class , 'update'])->name('admin.user.update');
        Route::delete('/destroy/{user}' , [UserController::class , 'destroy'])->name('admin.user.destroy');
        Route::get('/change/{user}', [UserController::class , 'change'])->name('admin.user.change');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
