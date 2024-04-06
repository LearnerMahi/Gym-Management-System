<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\ChooseController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/choose', function () {
    return view('choose');
})->name('/choose');
Route::post('/choose-post', [ChooseController::class, 'choosePost'])->name('choose.post');

Route::get('/adminlog',function(){
   return view('adminlog');
})->name('adminlog');
Route::post('/adminlogpost',[ChooseController::class,'adminlogPost'])->name('adminlog.post');
Route::get('/adminpage',function(){
  return view('adminpage');
})->name('adminpage');

Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');

Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile',function(){
return view('profile');
    })->name('profile');
}); 
Route::get("/forgetPassword",[ForgetPasswordManager::class,"forgetPassword"])->name("forget.password");
Route::post("/forgetPassword",[ForgetPasswordManager::class,"forgetPasswordPost"])->name("forget.password.post");
Route::get("/resetPassword{token}",[ForgetPasswordManager::class,"resetPassword"])->name("reset.password");
Route::post("/resetPassword",[ForgetPasswordManager::class,"resetPasswordPost"])->name("reset.password.post");