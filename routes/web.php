<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Admin;
use App\Tickets;
use App\Models\User;
use App\Http\Controllers\Agent;
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

//bad code


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/new', [TicketController::class, 'create']);
Route::post('/dashboard/new',[
			'uses'=>'TicketController@store',
			'as'=>'tick.post.create',]);
Route::get('/dashboard/view/{id}', 'TicketController@retrieve');
Route::post('comment', 'CommentsController@postComment');
Route::get('/dashboard', 'TicketController@check')->name('dashboard');;
Route::get('/dashboard/view', 'TicketController@viewall');
Route::get('/dashboard/admin', 'Admin@check');
Route::get('/dashboard/admin/settings', 'Admin@settings');
Route::post('/dashboard/admin/settings', ['uses'=>'Admin@postSettings', 'as'=>'admin.set.options']);
Route::get('/dashboard/admin/users', 'Admin@users');
Route::post('/dashboard/admin/users', ['uses'=>'Admin@userSubmit', 'as'=>'user.submit',]);
Route::get('/dashboard/admin/tickets','TicketController@atickets');
Route::get('/dashboard/agent', 'Agent@check');
Route::get('/dashboard/agent/tickets','TicketController@atickets');
Route::post('/dashboard/agent/tickets', ['uses'=>'TicketController@atickSub','as'=>'tick.submit',]);
Route::post('/dashboard/admin/tickets', ['uses'=>'TicketController@atickSub','as'=>'tick.submit',]);;
Route::get('/dashboard/admin/tickets/users/{id}', 'TicketController@users');
Route::post('/dashboard/admin/tickets/users/{id}', 'TicketController@userSub');
Route::get('/dashboard/admin/tickets/page?={id}', 'TicketController@atickSub');
Route::get('/dashboard/admin/tickets/active', 'TicketController@active');
Route::post('/dashboard/admin/tickets/active', ['uses'=>'TicketController@activeSub', 'as'=>'active.ticket',]);
Route::post('/dashboard/agent/tickets/user', ['uses'=>'TicketController@userSub', 'as'=>'active.ticket',]);
Route::get('/dashboard/agent/tickets/users/{id}', 'TicketController@users');
Route::post('/dashboard/agent/tickets/users/{id}', 'TicketController@userSub');
Route::get('/dashboard/agent/tickets/page?={id}', 'TicketController@atickSub');
Route::get('/dashboard/agent/tickets/active', 'TicketController@active');
Route::post('/dashboard/agent/tickets/active', ['uses'=>'TicketController@activeSub', 'as'=>'active.ticket',]);
Route::post('/dashboard/agent/tickets/user', ['uses'=>'TicketController@userSub', 'as'=>'active.ticket',]);
Route::get('/dashboard/admin/users/{id}', 'Admin@userSearch');
