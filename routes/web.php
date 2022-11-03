<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route :: get('/', [DemoController :: class,'index']);
Route :: get('/about',[DemoController:: class,'about']);
Route :: get('/courses', SingleActionController :: class);
Route :: resource('/photo',PhotoController:: class);

Route :: get('/register',[RegistrationController :: class,'forms']);
Route :: post('/register',[RegistrationController::class,'register']);

Route :: get('/customer',[RegistrationController ::class,'customer']);
Route ::post('/customer',[RegistrationController :: class,'store']);


