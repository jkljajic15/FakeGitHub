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
    Route::resource('repositories','RepositoryController');

    Route::get('/explore','ExploreController@index');
    Route::post('/explore/{repository}','ExploreController@store');
    Route::delete('/explore/{repository}','ExploreController@destroy');

    Route::get('/starred-repositories', function (){
        $user = User::find(Auth::id());
        $repositories = $user->starredRepositories()->simplePaginate(3);
        return view('starred_repositories', [
            'repositories' => $repositories
        ]);
    });
    Route::delete('/starred-repositories/{repository}', function (Repository $repository){
        DB::table('starred_repositories')
            ->where('repository_id', $repository->id)
            ->where('user_id', Auth::id())
            ->delete();
        return redirect('/starred-repositories');
    });



    Route::resource('repositories.issues', 'IssueController')->shallow()->only(['index', 'create', 'store', 'show', 'update']);
    Route::post('/issue-comments', function (){
        request()->validate(['body' => 'required']);
        Issue_Comment::create([
            'user_id' => Auth::id(),
            'issue_id'=> request('issue_id'),
            'body' => request('body')
        ]);
        return redirect("/issues/". request('issue_id'));
    });

    Route::get('profile','UserController@myProfile');
    Route::get('/followers','UserController@getFollowers');
    Route::get('/following','UserController@getFollowees');
    Route::get('profile/{id}','UserController@show');
    Route::post('profile/{id}','UserController@store');
    Route::delete('profile/{id}','UserController@destroy');
    Route::get('/mark-as-read/{notification}', 'UserController@markRead')->name('markAsRead');
});

Auth::routes();

