<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

Route::middleware(['guest'])->group(function () { 
    Route::get('/', function () {
        return view('categories.auth.login');
    });
    Route::post('login', [AuthController::class,'login'])->name('login.user');
    //  Route::get('/home', [AuthController::class, 'index'])->name('index');
    
    Route::get('login', [AuthController::class,'loginView'])->name('login');
    Route::get('register', [AuthController::class,'registerView'])->name('register');
    Route::post('register', [AuthController::class,'register'])->name('register.user');
});
        
Route::middleware(['auth'])->group(function () { 
    //dd("XYZP");
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
    Route::resource('category', CategoryController::class);
    Route::get('/home', [AuthController::class, 'index'])->name('index'); //->middleware('check');
    
}); 


