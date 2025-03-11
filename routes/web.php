<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\todoController;
use App\Http\Middleware\NoLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::middleware([NoLogin::class])->group(function(){

    Route::controller(AuthController::class)->group(function(){

        Route::get('/', 'index');
        Route::post('/', 'login_proses')->name('login');
    
        Route::get('/register', 'register');
        Route::post('/register', 'register_proses');
    
    });

});



Route::middleware(['auth'])->group(function(){

    Route::get('/logout', [AuthController::class, 'log_keluar']);

    Route::controller(homeController::class)->group(function(){
        Route::get('/home', 'index');
        
    });
    
    Route::controller(todoController::class)->group(function(){
    
        Route::get('/add', 'index');
        Route::post('/add', 'store');
    
        Route::get('/edit/{id}', 'edit');
        Route::post('/edit/{id}', 'update');

        Route::get('/home/{id}', 'show');

        Route::get('/delete/{id}', 'destroy');
    });
});


Route::fallback(function () {
    Auth::logout();
    return response()->view('errors.404', [], 404);
});