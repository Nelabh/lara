<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('as'=>'home','uses'=>'PagesController@home'));


Route::get('login', array('as'=>'login','uses'=>'PagesController@login'));
Route::get('signup',array('as'=>'signup','uses'=> 'PagesController@signup'));

Route::post('login',array('before'=>'csrf','uses'=> 'UserController@login'));
Route::post('signup',array('before'=>'csrf','uses'=> 'UserController@signup'));

