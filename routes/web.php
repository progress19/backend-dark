<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\UsuarioController; 

Auth::routes();

//Route::match(['get', 'post'], '/admin', 'AdminController@login');
//Route::match(['get', 'post'], '/admin/login', 'AdminController@login');
//Route::match(['get', 'post'], '/login', 'AdminController@login')->name('login');

//Route::get('login', [AdminController::class, 'login']);
//Route::get('admin', [AdminController::class, 'login']);

Route::match(['get', 'post'], 'admin', [AdminController::class, 'login']);
Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('login');
Route::match(['get', 'post'], 'logout', [AdminController::class, 'logout']);


Route::group(['middleware' => ['auth']], function() {

	Route::get('/', function () { return view('admin/dashboard'); });
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

	/* DATATABLES */

	//Route::get('dataUsuarios', 'UsuarioController@getData')->name('dataUsuarios');
	Route::get('dataUsuarios', [UsuarioController::class, 'getData'])->name('dataUsuarios');

	/**/
	
	Route::get('/admin/settings', 'AdminController@settings');
	Route::get('/admin/edit-user', 'AdminController@editUser');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'], '/admin/update-pwd', 'AdminController@updatePassword');
	
	Route::get('/admin/reset-pwd','AdminController@resetPassword');

	//Usuarios Routes (Admin)
	//Route::match(['get','post'],'/admin/add-usuario','UsuarioController@addUsuario');
	Route::match(['get', 'post'], 'admin/agregar-usuario', [UsuarioController::class, 'addUsuario']);
	//Route::match(['get','post'],'/admin/edit-usuario/{id}','UsuarioController@editUsuario');

	//Route::match(['get','post'],'/admin/delete-usuario/{id}','UsuarioController@deleteUsuario');
	
	Route::get('/admin/ver-usuarios', [UsuarioController::class, 'viewUsuarios']);

});
