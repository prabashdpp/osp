<?php

use Illuminate\Support\Facades\Route;
use App\Ticket;
use Illuminate\Http\Request;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('new-ticket', 'TicketsController@create')->name('open_ticket');
 
Route::post('new-ticket', 'TicketsController@store')->name('save_ticket');
 
Route::get('tickets/{ticket_id}', 'TicketsController@show')->name('get_tickets');;
 
Route::post('reply', 'RepliesController@sendReply')->name('reply');
 
Route::group(['middleware' => 'auth'], function (){
 
    Route::resource('tickets', 'TicketsController');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close')->name('close');
   
 });
 
 Route::any('/search', 'TicketsController@search')->name('search');
