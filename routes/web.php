<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardadController;
use App\Http\Controllers\Author\DashboardauController;
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

	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace'=> 'Admin', 'middleware' => ['auth','admin']],
    function(){
        Route::get('dashboard', [DashboardadController::class, 'index'])->name('dashboard');
    });

    Route::group([ 'as'=>'author.', 'prefix'=>'author', 'namespace'=> 'Author', 'middleware' => ['auth','author']],
    function(){
        Route::get('dashboard', [DashboardauController::class, 'index'])->name('dashboard');
    });
