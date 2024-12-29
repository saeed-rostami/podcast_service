<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//**************************************************
//ADMIN **************************************************
//**************************************************
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', 'PanelController@index')->name('admin.panel');
});
