<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'OffreController@welcome')->name('welcome');;

Route::get('/register_singin', function () {return view('register_singin');})->name('register_singin');

Route::get('/submit_property', function () {return view('submit-property');})->name('submit_property');

Auth::routes();

Route::resource('client', 'ClientController');
Route::resource('offer', 'OffreController');
Route::resource('demand', 'DemmandController');
