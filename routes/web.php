<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


//**************************************************
//ADMIN **************************************************
//**************************************************
Route::prefix('panel')
//    ->middleware('isAdmin')
    ->group(function () {
    Route::get('/', \App\Livewire\Admin\Index::class)->name('admin.panel');

//    CATEGORY
    Route::prefix('category')->group(function () {
        Route::get('/', \App\Livewire\Admin\Category::class)->name('admin.category.index');
        Route::get('/create', \App\Livewire\Admin\CategoryCreate::class)->name('admin.category.create');
        Route::get('/update/{category}', \App\Livewire\Admin\CategoryUpdate::class)->name('admin.category.update');
    });

//    PODCAST
        Route::prefix('podcast')->group(function () {
            Route::get('/', \App\Livewire\Admin\Podcast::class)->name('admin.podcast.index');
            Route::get('/create', \App\Livewire\Admin\PodcastCreate::class)->name('admin.podcast.create');
            Route::get('/update/{podcast}', \App\Livewire\Admin\PodcastUpdate::class)->name('admin.podcast.update');
        });

        //    USERS
        Route::prefix('users')->group(function () {
            Route::get('/', \App\Livewire\Admin\Users::class)->name('admin.user.index');
        });
});
