<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
    // return redirect('/alle_tickets');
    return redirect()->route('login');
});

// PAGES OF THE NAV MENU
Route::get('/alle_tickets', [PagesController::class, 'alle_tickets'])->middleware('auth');
Route::get('/users', [PagesController::class, 'users'])->middleware('auth');
Route::get('/history', [PagesController::class, 'history'])->middleware('auth');
Route::get('/trashed', [PagesController::class, 'trashed'])->middleware('auth');
Route::get('/settings', [PagesController::class, 'settings'])->middleware('auth');


// TICKET CONTROLLER
Route::resource('ticket', TicketController::class)->middleware('auth');


// USER CONTROLLER
Route::resource('user', UserController::class)->middleware('auth');


// NOTE CONTROLLER
Route::resource('note', NoteController::class)->middleware('auth');


// AUTHENTICATION CONTROLLER
Route::patch('/verify_user/{userID}', [AuthController::class, 'verify_user'])->middleware('auth');


// USER PHONE NUMBER AND COMPANY NAME UPDATE IN
Route::patch('/more_info/{userID}', [AuthController::class, 'more_info'])->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/sign_up', [AuthController::class, 'sign_up'])->name('sign_up');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register_login', [AuthController::class, 'register_login'])->name('register_login');
Route::post('/register_sign_up', [AuthController::class, 'register_sign_up'])->name('register_sign_up');
