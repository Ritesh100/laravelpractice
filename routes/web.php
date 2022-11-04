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

//open registration form
Route :: get('/customer',[RegistrationController ::class,'customer']);
//insert data into databse
Route ::post('/customer',[RegistrationController :: class,'store']);
//view table
Route :: get('/customer/view',[RegistrationController ::class,'view']);

//delete
Route :: get('/customer/delete/{id}',[RegistrationController::class,'delete'])->name('customer.delete');
//edit
Route :: get('/customer/edit/{id}',[RegistrationController::class,'edit'])->name('customer.edit');
//update 
Route :: post('/customer/update/{id}',[RegistrationController::class,'update'])->name('customer.update');
