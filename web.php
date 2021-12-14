<?php
use Gondr\App\Route;

Route::get('/', "MainController@index");

Route::get('/user/register',"UserController@register");
Route::post('/user/register',"UserController@registerProcess");

Route::get('/user/login',"UserController@login");
Route::post('/user/login',"UserController@loginProcess");

Route::get('/user/logout',"UserController@logout");

Route::get('/board' ,"BoardController@board");
Route::get('/board/view' ,"BoardController@view");
Route::post('/board/view' ,"BoardController@viewProcess");

Route::get('/board/write' ,"BoardController@write");
Route::post('/board/write' ,"BoardController@writeProcess");

Route::get('/board/mod' ,"BoardController@mod");
Route::post('/board/mod' ,"BoardController@modProcess");

Route::get('/board/delete' ,"BoardController@delete");
Route::post('/board/Enorll',"BoardController@enorll");

Route::get('/peed' , "BoardController@peed");
Route::get('/admin' , "adminController@admin");
Route::get('/admin/delete' , "adminController@delete");

Route::get('/user/idFind' , "userController@idFind");
Route::post('/user/idFind' , "userController@idFindProcess");

Route::get('/user/passFind' , "userController@passFind");
Route::post('/user/passFind' , "userController@passFindProcess");

Route::get('/admin/userDel', 'adminController@userDel');
Route::get('/admin/comment','adminController@comment');

Route::post('/thumbs',"boardController@thumbs");
Route::post('/user/profile','UserController@profile');

