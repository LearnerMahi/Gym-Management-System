<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\CheckPaymentStatus;
use App\Models\Trainer;
//use App\helper;
/*
Route::get('/route', function () {
    return helper::redirectToSpecificView();
});*/


//Route::get('/', function () {
    //return view('welcome');
//})->name('home');

Route::get('/', function () {
    return view('choose');
})->name('choose');



//Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::post('/choose-post', [ChooseController::class, 'choosePost'])->name('choose.post');


Route::get('/adminlog',function(){
   return view('adminlog');
})->name('adminlog');
Route::post('/adminlogpost',[ChooseController::class,'adminlogPost'])->name('adminlog.post');
Route::get('/adminpage',function(){
  return view('adminpage');
})->name('adminpage');
Route::get('/adminpage/delete/{id}',[ChooseController::class,'tradele'])->name('tradele');
Route::get('/adminlogout', 'AuthManager@adlogout')->name('adlogout');


Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');

Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile',function(){
return view('profile');
    })->name('profile');
    Route::get('/profman',function(){
        return view('profman');
            })->name('profman');
            Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
}); 


Route::get('/trareg',function(){
   return view("trainer");
})->name("trainer");
Route::get("/forgetPassword",[ForgetPasswordManager::class,"forgetPassword"])->name("forget.password");
Route::post("/forgetPassword",[ForgetPasswordManager::class,"forgetPasswordPost"])->name("forget.password.post");
Route::get("/resetPassword{token}",[ForgetPasswordManager::class,"resetPassword"])->name("reset.password");
Route::post("/resetPassword",[ForgetPasswordManager::class,"resetPasswordPost"])->name("reset.password.post");

Route::get("/registrainer",[TrainerController::class,"regtrainer"])->name("regtrainer");
Route::post("/registrainerPost",[TrainerController::class,"regtrainerpost"])->name("regtrainer.post");

Route::get("/trainerpage",function(){
  return view("trainerhome");
})->name('thome');

Route::get("/tralogin",[TrainerController::class,"logtrainer"])->name("logtrainer");
Route::post("/tralogin",[TrainerController::class,"logtrainerpost"])->name("logtrainer.post");

Route::put('/trainer/update/{gym_membership_id}', [TrainerController::class, 'update'])->name('trainer.update');



Route::middleware(CheckPaymentStatus::class)->group(function () {
    Route::get('/profile',function(){
        return view('profile');
            })->name('profile');
});
Route::get('/search', function (Illuminate\Http\Request $request) {
    $specialization = $request->input('specialization');
    $trainers = Trainer::where('specialization', $specialization)->get();
    return response()->json($trainers);
});

/* Route::middleware(['isAdmin'])->group(function () {
    Route::post('/adminlogpost',[ChooseController::class,'adminlogPost'])->name('adminlog.post');
    Route::get('/adminpage',function(){
      return view('adminpage');
    })->name('adminpage');
    Route::get('/adminpage/delete/{id}',[ChooseController::class,'tradele'])->name('tradele');
    Route::get('/adminlogout', 'AuthManager@adlogout')->name('adlogout');
}); */

