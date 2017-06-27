
<?php

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

Route::post('changelocale', 'LanguageController@index')->name('changelocale');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


//Facebook Connect
Route::get('auth/facebook', 'FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

////////////////////////////////// A D M I N //////////////////////////////////////////////////

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'AdminController@logout')->name('admin.logout');

	// Password reset routes
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

	// Customers
	Route::prefix('users')->group(function(){
		Route::get('/all', 'Admin\UserController@index')->name('admin.users.index');
		Route::get('/new', 'Admin\UserController@create')->name('admin.users.new');
		Route::post('/store', 'Admin\UserController@store')->name('admin.users.store');
		Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin.users.edit');
		Route::post('/update/{id}', 'Admin\UserController@update')->name('admin.users.update');
		Route::post('/delete/{id}', 'Admin\UserController@delete')->name('admin.users.delete');

		Route::get('/new-address/{id}', 'Admin\UserAddressController@create')->name('admin.users.address.new');
		Route::get('/address/{id}', 'Admin\UserAddressController@show')->name('admin.users.address');
		Route::post('/address-store', 'Admin\UserAddressController@store')->name('admin.users.address.store');
		Route::get('/address-edit/{id}', 'Admin\UserAddressController@edit')->name('admin.users.address.edit');
		Route::post('/address-update/{id}', 'Admin\UserAddressController@update')->name('admin.users.address.update');
		Route::post('/address-delete/{id}', 'Admin\UserAddressController@delete')->name('admin.users.address.delete');
	});

	Route::prefix('categories')->group(function(){
		Route::get('/all', 'Admin\CategoryController@index')->name('admin.categories.index');
		Route::get('/new', 'Admin\CategoryController@create')->name('admin.categories.new');
		Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
		Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.categories.edit');
		Route::post('/update/{id}', 'Admin\CategoryController@update')->name('admin.categories.update');
		Route::post('/delete/{id}', 'Admin\CategoryController@delete')->name('admin.categories.delete');
	});
});


