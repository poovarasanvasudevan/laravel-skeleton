<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    if (session("user"))
//        return view('dashboard');
//    else
//        return view('welcome');
//});


Route::get('/artefacttypes', "Dashboard@artefacttypes");
Route::get('/menus', "Dashboard@getmenu");
Route::post("/createuser", "UserController@createUser");
Route::post("/assignpermission/{userid}/{permission}", "UserController@assignPermission");
Route::post("/createpermission/{name}/{permission}/{desc}", "RolesController@createPermission");

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

    Route::get('/', "Dashboard@welcome");
    Route::get('/logout', "Dashboard@logout");
    Route::get('/dashboard', "Dashboard@dashboard");
    Route::get('/sess', "Dashboard@sess");


    Route::post('/validate/{username}/{password}', "Dashboard@login");
    Route::post('/makesession/{username}', "Dashboard@makesession");
});
