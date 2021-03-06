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
Route::group(['middleware'=>['web']],function() {
    
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup',[
        'uses' => 'UserController@postSignUp',
        'as'=>'signup'
    ]);
    Route::post('/signin',[
        'uses' => 'UserController@postSignIn',
        'as'=>'signin'
    ]);    
    Route::get('/dashboard',[
        'uses'=>'PostController@getDashboard',
        'as'=>'dashboard',
        // 'middleware'=>'auth'
        ]);        
    Route::post('/createpost',[
        'uses'=>'PostController@postCreatePost',
        'as'=>'post.create'
    ]);
    Route::get('/post-delete/{post_id}',[
              'uses'=>'PostController@getDeletePost',
              'as'=>'post.delete'
    ]);  

    Route::post('/updateaccount',[
        'uses'=>'UserController@postSaveAccount',
        'as'=>'account.save'
    ]);

    Route::get('/logout',[
        'uses'=>'PostController@getLogOut',
        'as'=>'logout'
    ]);

    Route::get('/account',[
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);

    Route::post('/edit',[
        'uses'=>'PostController@edit',
        'as'=>'edit'
    ]);

    Route::get('/userimage/{file_name}',[
        'uses'=>'UserController@postSaveAccount',
        'as' => 'account.image'
    ]);
});

