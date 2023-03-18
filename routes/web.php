<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoteController;
use App\Http\Middleware\CustomAuth;


Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'signIn'])->name('loginPost');
Route::post('/register',[RegisterController::class,'create'])->name('register/create');

Route::middleware(['customAuth'])->group(function () {
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::get('dashboard',[LoginController::class,'dashboard'])->name('dashboard');
    Route::post('create',[NoteController::class,'create'])->name('addNotes');
    Route::get('editNote/{id}',[LoginController::class,'editNote'])->name('editNotes');
    Route::put('editNote/{id}',[LoginController::class,'update'])->name('update');
    Route::get('delete/{id}',[NoteController::class,'deleteNote'])->name('delete');
    Route::get('profile/{id}',[LoginController::class,'profile'])->name('profile');
    Route::put('profile/{id}',[LoginController::class,'profileUpdate'])->name('updateProfile');
});
