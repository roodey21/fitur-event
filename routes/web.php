<?php

use Livewire\ListEvent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\{EventShow, EventToday};
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

// Route website frontend
Route::get('/', 'FrontController@index'); // halaman home
Route::get('/coba', ListEvent::class); // halaman event
// Route::get('/event', 'FrontController@event');
Route::view('/modal', 'layouts.new');
Route::get('/coba2', EventToday::class);
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/front', function () {
    return view('layouts.front');
})->name('front.home');
Route::get('/event', function () {
    return view('front.event');
})->name('front.event');
// Route::get('/front2', function () {
//     return view('layouts.front2');
// })->name('front2.home');

Auth::routes();
Route::group(['prefix' => 'inkubator', 'middleware' => ['role:inkubator']], function () {
    Route::get('/', 'Inkubator\HomeController@index')->name('inkubator.home');
    Route::get('/profile', 'Inkubator\ProfileController@index')->name('inkubator.profile');
    Route::get('/profile/edit', 'Inkubator\ProfileController@edit')->name('inkubator.profile.edit');
    Route::post('/profile/update', 'Inkubator\ProfileController@update')->name('inkubator.profile.update');
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
    Route::get('/profile', 'Mentor\ProfileController@index')->name('mentor.profile');
    Route::get('/profile/edit', 'Mentor\ProfileController@edit')->name('mentor.profile.edit');
    Route::post('/profile/update', 'Mentor\ProfileController@update')->name('mentor.profile.update');
    Route::get('/event', 'Event\EventController@indexMentor')->name('mentor.event-list');
    Route::get('/event/calendar', 'Event\EventController@calendarMentor')->name('mentor.event-calendar');
    Route::get('/event/{event:slug}', 'Event\EventController@show');
});

Route::group(['prefix' => 'tenant', 'middleware' => ['role:tenant']], function () {
    Route::get('/', 'Tenant\HomeController@index')->name('tenant.home');
    Route::get('/profile', 'Tenant\ProfileController@index')->name('tenant.profile');
    Route::get('/profile/edit', 'Tenant\ProfileController@edit')->name('tenant.profile.edit');
    Route::post('/profile/update', 'Tenant\ProfileController@update')->name('tenant.profile.update');
    Route::get('/event', 'Event\EventController@indexTenant')->name('tenant.event-list');
    Route::get('/event/calendar', 'Event\EventController@calendarTenant')->name('tenant.event-calendar');
    Route::get('/event/{event:slug}', 'Event\EventController@show');
});
