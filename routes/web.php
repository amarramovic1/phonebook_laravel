<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//test rute
Route::get('/pocetna',[HomeController::class,'getHomePage']);
Route::get('/kontakt/{id}/detalji',[HomeController::class,'getContactDetails']);//za dinamicki slanje id-a
Route::get('/contact/save',[HomeController::class,'saveContact']);
//Contact routes
Route::get('/contacts',[ContactController::class,'index'])->name('contact.index');
Route::get('/contacts/create',[ContactController::class,'create'])->name('contact.create');
Route::get('/contacts/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
Route::post('/contacts',[ContactController::class,'save'])->name('contact.save');
Route::put('/contacts/{id}',[ContactController::class,'update'])->name('contact.update');
Route::delete('/contacts/{id}',[ContactController::class,'delete'])->name('contact.delete');
//Countries routes
Route::get('/countries',[CountriesController::class,'index'])->name('countries.index');
Route::get('/countries/create',[CountriesController::class,'create'])->name('countries.create');
Route::get('/countries/{id}/edit',[CountriesController::class,'edit'])->name('countries.edit');
Route::post('/countries/save',[CountriesController::class,'save'])->name('countries.save');
Route::put('/countries/{id}',[CountriesController::class,'update'])->name('countries.update');
Route::delete('/countries/{id}',[CountriesController::class,'delete'])->name('countries.delete');
//Hobbies routes
Route::get('/hobbies',[HobbiesController::class,'index'])->name('hobbies.index');
Route::get('/hobbies/create',[HobbiesController::class,'create'])->name('hobbies.create');
Route::get('/hobbies/{id}/edit',[HobbiesController::class,'edit'])->name('hobbies.edit');
Route::post('/hobbies/save',[HobbiesController::class,'save'])->name('hobbies.save');
Route::put('/hobbies/{id}',[HobbiesController::class,'update'])->name('hobbies.update');
Route::delete('/hobbies/{id}',[HobbiesController::class,'delete'])->name('hobbies.delete');
//Cities routes
Route::get('/cities',[CitiesController::class,'index'])->name('cities.index');
Route::get('/cities/create',[CitiesController::class,'create'])->name('cities.create');
Route::get('/cities/{id}/edit',[CitiesController::class,'edit'])->name('cities.edit');
Route::post('/cities/save',[CitiesController::class,'save'])->name('cities.save');
Route::put('/cities/{id}',[CitiesController::class,'update'])->name('cities.update');
Route::delete('/cities/{id}',[CitiesController::class,'delete'])->name('cities.delete');
