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

Route::get('/', function () {
    return view('home');
})->middleware ('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('children', 'Children\ChildrenController');

    Route::resource('trainer', 'Trainer\TrainerController');

    Route::resource('shedule', 'Shedule\SheduleController');

    Route::resource('cash', 'Cash\CashController');

    Route::get('calendar', 'CalendarEvent\CalendarEventController@index')->name('calendar.index');
    Route::get('calendar/getShedule', 'CalendarEvent\CalendarEventController@getShedule')->name('calendar.getShedule');

    Route::middleware(['admin'])->group(function () {
        Route::resource('user', 'User\UserController');

        Route::get('log', 'Log\LogController@index')->name('log.index');

        Route::get('log/clear', 'Log\LogController@clear')->name('log.clear');
    });
});
