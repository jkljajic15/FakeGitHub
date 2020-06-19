<?php

use App\Issue_Comment;
use App\Repository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => ['auth']], function (){
    Route::get('/','RepositoryController@index');
    Route::get('/home','RepositoryController@index')->name('home');
    Route::get('/starred-repositories','RepositoryController@starred');
    Route::get('/explore','RepositoryController@explore');
    Route::post('/add-star/{repository}','RepositoryController@addStar')->name('add-star');
    Route::delete('/remove-star/{repository}','RepositoryController@removeStar')->name('remove-star');
    Route::resource('repositories','RepositoryController');
    Route::post('/upload-file/{repository}','FileController@store');
    Route::delete('/remove-file/{file}','FileController@destroy');
    Route::delete('/remove-contributor/{contributor}','ContributorController');

    Route::resource('repositories.issues', 'IssueController')->shallow()->only(['index', 'create', 'store', 'show', 'update']);
    Route::post('/issue-comments/{id}','IssueController@storeComment');

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

