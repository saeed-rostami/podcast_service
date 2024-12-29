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

    Route::prefix('category')->group(function () {
        Route::get('/', \App\Livewire\Admin\Category::class)->name('admin.category.index');
    });
});
