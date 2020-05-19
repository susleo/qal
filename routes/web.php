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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/question', 'QuestionController');
Route::resource('question.reply', 'ReplyController')->except(['index','show','create']);

Route::post('question/{question}/reply/{reply}', 'QuestionController@bestReply')->name('bestReply');

Route::delete('fav/{question}/', 'QuestionController@unfavourite')->name('unfav');
Route::post('fav/{question}/', 'QuestionController@favourite')->name('fav');


Route::post('question/{question}/vote/','QuestionController@voteCont')->name('votes');
Route::post('reply/{reply}/vote/','ReplyController@voteCont')->name('voteReply');

Route::post('voteup/{question}/', 'QuestionController@voteup')->name('up');
Route::post('votedown/{question}/', 'QuestionController@votedown')->name('downn');