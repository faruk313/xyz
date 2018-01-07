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





Auth::routes();

Route::group(['middleware' => 'guest'],function(){

	Route::get('/',function(){
		return view('auth.login');
	})->name('login');

});



Route::group(['middleware' => 'auth'],function(){

	Route::get('/logout',[
		'uses'	=> 'LogoutController@logout',
		'as'	=> 'logout'
	]);

});


Route::group(['middleware' => 'auth'],function(){

	Route::get('/',[
		'uses'	=> 'AdminController@index',
		'as'	=> 'admin'
	]);

});

Route::group(['middleware' => 'auth'],function(){

	Route::get('/add-category',[
		'uses'	=> 'CategoryController@add',
		'as'	=> 'addCat'
	]);

});

Route::group(['middleware' => 'auth'],function(){

	Route::get('/view-category',[
		'uses'	=> 'CategoryController@view',
		'as'	=> 'viewCat'
	]);

});

Route::group(['middleware' => 'auth'],function(){

	Route::get('/edit-category/{id}',[
		'uses'	=> 'CategoryController@edit',
		'as'	=> 'editCat'
	]);

});

Route::group(['middleware' => 'auth'],function(){

    Route::post('/update-category',[
        'uses'	=> 'CategoryController@update',
        'as'	=> 'updateCat'
    ]);

});

Route::group(['middleware' => 'auth'],function(){

    Route::post('/save-category',[
        'uses'	=> 'CategoryController@save',
        'as'	=> 'saveCat'
    ]);

    Route::get('/add-product',[
        'uses'	=> 'ProductController@add',
        'as'	=> 'addProduct'
    ]);

    Route::get('/del-category/{id}',[
        'uses'	=> 'CategoryController@del',
        'as'	=> 'delCategory'
    ]);

});




Route::get('/home', 'HomeController@index')->name('home');

