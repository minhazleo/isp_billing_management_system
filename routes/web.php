<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

// Route::group(['prefix' => 'backend'], function () {
    
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@showUserProfile')->name('profile');
Route::get('/packages', 'HomeController@showPackages')->name('packages');
Route::post('/package-create', 'HomeController@createPackage')->name('create.package');
Route::get('/clients', 'HomeController@showClients')->name('clients');
Route::post('/client-create', 'HomeController@createClient')->name('create.client');
Route::get('/resellers', 'HomeController@showResellers')->name('resellers');
Route::post('/reseller-create', 'HomeController@createReseller')->name('create.reseller');
Route::get('/staff', 'HomeController@showStaff')->name('staff');
Route::post('/employee-create', 'HomeController@createStaff')->name('create.employee');
Route::get('/income', 'HomeController@showIncome')->name('income');
Route::post('/income-new', 'HomeController@newIncome')->name('new.income');
Route::get('/expenses', 'HomeController@showExpenses')->name('expenses');
Route::post('/expenses-new', 'HomeController@newExpenses')->name('new.expenses');
Route::get('/tickets', 'HomeController@showTickets')->name('tickets');
Route::get('/reports', 'HomeController@showReports')->name('reports');
Route::get('/settings', 'HomeController@showSettings')->name('settings');
