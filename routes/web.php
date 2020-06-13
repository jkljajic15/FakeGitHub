<?php

use App\Issue_Comment;
use App\Repository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


Route::group(['middleware' => ['auth']], function (){
    Route::get('/','RepositoryController@index')->name('home');
    Route::get('/starred-repositories','RepositoryController@starred');
    Route::get('/explore','RepositoryController@explore');
    Route::post('/add-star/{repository}','RepositoryController@addStar')->name('add-star');
    Route::delete('/remove-star/{repository}','RepositoryController@removeStar')->name('remove-star');
    Route::resource('repositories','RepositoryController');

    Route::resource('repositories.issues', 'IssueController')->shallow()->only(['index', 'create', 'store', 'show', 'update']);
    Route::post('/issue-comments','IssueController@storeComment');

    Route::get('profile','UserController@myProfile');
    Route::get('/followers','UserController@getFollowers');
    Route::get('/following','UserController@getFollowees');
    Route::get('profile/{id}','UserController@show');
    Route::post('profile/{id}','UserController@store');
    Route::delete('profile/{id}','UserController@destroy');
    Route::get('/mark-as-read/{notification}', 'UserController@markRead')->name('markAsRead');



    Route::post('/profile', 'UserController@storeImage');

});

Auth::routes();

