<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherForecastController;

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

// Route::get('/', function () {
//     return view('pages/home');
// });
Route::view('/','home')->name('home');
Route::view('about','pages.about')->name('about');
Route::view('restricted','pages.restricted')->name('restricted');
Route::view('register','auth.register')->name('register');
Route::view('login','auth.login')->name('login');
//Route::get('/admin-page', 'HomeController@adminPage')->middleware('checkUserGroup:Admin')->name('admin.page');
Route::get('/admin-page', [HomeController::class, 'adminPage'])
    ->middleware('checkUserGroup:admin')
    ->name('admin.page');
Route::get('/user-page', [HomeController::class, 'anotherPage'])
//->middleware('checkUserGroup:admin')
->name('user.pager');
Route::get('/user-list', [HomeController::class, 'userList'])
->middleware('checkUserGroup:admin')
->name('user.list');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])
    ->middleware('checkUserGroup:admin')
    ->name('user.edit');

Route::put('/user/update/{id}', [UserController::class, 'update'])
    ->middleware('checkUserGroup:admin')
    ->name('user.update');

    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])
    ->middleware('checkUserGroup:admin')
    ->name('user.delete');

//ROUTES FOR OPENWEATHERAPI
Route::get('/weather_forecast/list', [WeatherForecastController::class, 'list'])
    //->middleware('checkUserGroup:Admin')
    ->name('weather_forecast.list');

Route::post('/weather_forecast/fetch', [WeatherForecastController::class, 'fetchWeather'])
    ->middleware('checkUserGroup:Admin')
    ->name('weather_forecast.fetch');

Route::post('/weather_forecast/search', [WeatherForecastController::class, 'search'])
    //->middleware('checkUserGroup:Admin')
    ->name('weather_forecast.search');
Route::get('/weather-forecast/fetch', [WeatherForecastController::class, 'showFetchForm'])
    ->name('weather_forecast.fetch.form');

Route::post('/weather-forecast/fetch', [WeatherForecastController::class, 'fetchWeather'])
    ->name('weather_forecast.fetch');

    Route::get('/weather-forecast/edit/{id}', [WeatherForecastController::class, 'edit'])
    ->name('weather_forecast.edit');

Route::put('/weather-forecast/update/{id}', [WeatherForecastController::class, 'update'])
    ->name('weather_forecast.update');

Route::delete('/weather-forecast/destroy/{id}', [WeatherForecastController::class, 'destroy'])
    ->name('weather_forecast.destroy');
//ROUTES FOR OPENWEATHERAPI
//Route::get('/user-list', [HomeController::class, 'userList'])->middleware('can:view-user-list')->name('user.list');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
