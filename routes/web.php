<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','FrontSiteController@ShowIndex')->name('frontsite.index');
Route::get('post','FrontSiteController@ShowPost')->name('frontsite.post');
Route::get('about','FrontSiteController@ShowAbout')->name('frontsite.about');
Route::get('contact','FrontSiteController@ShowContact')->name('frontsite.contact');

Route::resource('project','Dashboard\ProjectController');//admmin



Route::get('dashboard', function () {
    return view('Dashboard.index');})->name('Dashboard.index')->middleware('auth');


Route::get('login','AuthController@login')->name('login');
Route::post('authenticate','AuthController@authenticate')->name('authenticate');
Route::get('logout','AuthController@logout')->name('logout');
