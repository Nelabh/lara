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
Route::get('rules', array('as'=>'rules','uses'=>'PagesController@rules'));

Route::get('logout',array('as'=>'logout','uses'=> 'UserController@logout'));
Route::get('dashboard',array('as'=>'dashboard','uses'=> 'PagesController@dashboard'));
Route::get('leaderboard/{id}', array('as'=>'leaderboard', 'uses'=>'PagesController@leaderboard'));
Route::get('leaderboard', array('as'=>'leaderboard', 'uses'=>'PagesController@leader'));
Route::get('dashboard/navigate/{lvl}', array('as'=>'nav', 'uses'=>'DashController@navigate'));
//Route::get('rank',array('as'=>'rank','uses'=> 'DashController@globrank'));
Route::get('wait', array('as'=>'wait', 'uses'=>'DashController@wait'));
Route::get('next', array('as'=>'next', 'uses'=>'DashController@next'));


Route::get('xaam', array('uses'=>'PagesController@test'));

Route::post('dashboard/check',array('before'=>'csrf', 'uses'=> 'DashController@check'));
Route::post('log',array('before'=>'csrf', 'uses'=> 'UserController@login'));
Route::post('sign',array('before'=>'csrf', 'uses'=> 'UserController@signup'));