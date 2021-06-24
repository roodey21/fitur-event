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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();
Route::group(['prefix' => 'inkubator', 'middleware' => ['role:inkubator']], function () {
    Route::get('/', 'Inkubator\HomeController@index')->name('inkubator.home');
    Route::get('/profile', 'Inkubator\ProfileController@index')->name('inkubator.profile');
    Route::get('/profile/edit', 'Inkubator\ProfileController@edit')->name('inkubator.edit');
    Route::post('/profile/update', 'Inkubator\ProfileController@update')->name('inkubator.update');
    Route::get('/event', 'Event\EventController@index')->name('inkubator.event-list');
    Route::get('/event/calendar', 'Event\EventController@calendar')->name('inkubator.event-calendar');
    Route::get('/event/create', 'Event\EventController@create')->name('inkubator.event.create');
    Route::post('/event/store', 'Event\EventController@store')->name('inkubator.event.store');
    Route::get('/event/{event:slug}', 'Event\EventController@show');
    Route::get('/event/{event:slug}/edit', 'Event\EventController@edit')->name('inkubator.event.edit');
    Route::patch('/event/{event:slug}/edit', 'Event\EventController@update');
    Route::get('/event/{event:slug}/delete', 'Event\EventController@destroy');
});

Route::group(['prefix' => 'mentor', 'middleware' => ['role:mentor']], function () {
    Route::get('/', 'Mentor\HomeController@index')->name('mentor.home');
});

Route::group(['prefix' => 'tenant', 'middleware' => ['role:tenant']], function () {
    Route::get('/', 'Tenant\HomeController@index')->name('tenant.home');
});
