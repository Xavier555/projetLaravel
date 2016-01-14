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

Route::get('/', function () {
    return view('welcome');
});


// Pour la liste des taches
Route::get('/tasks', [
    'uses'=>'TaskController@index',
    'middleware'=>'auth'
]);


Route::post('/task', [
        'uses'=>'TaskController@store',
        'middleware'=>'auth'
]);

Route::delete('/task/{task}', [
        'uses'=>'TaskController@destroy',
        'middleware'=>'auth'
]);

Route::post('/getModifyTask/{task}', [
    'uses'=>'TaskController@getUpdateListask',
    'middleware'=>'auth'
]);

Route::get('/getModifyTask/{task}', [
    'uses'=>'TaskController@getUpdateListask',
    'middleware'=>'auth'
]);

// Valider l'update d'une tâche
Route::post('/setModifyTask/{task}', [
    'uses'=>'TaskController@setUpdateListask',
    'middleware'=>'auth'
]);





//----------------------------------------------------------
// Pour les taches
//----------------------------------------------------------
Route::post('/listasks/{task}', [
    'uses'=>'ListaskController@indexList',
    'middleware'=>'auth'
]);
Route::get('/listasks/{task}', [
    'uses'=>'ListaskController@indexList',
    'middleware'=>'auth'
]);

// stocker une nouvelle tâche
Route::post('/listask/{listask}', [
    'uses'=>'ListaskController@store',
    'middleware'=>'auth'
]);

// valider une tâche
Route::post('/validate/{listask}', [
    'uses'=>'ListaskController@updateValidation',
    'middleware'=>'auth'
]);

// Obtenir le formulaire d'update d'une tâche
Route::post('/getModify/{listask}', [
    'uses'=>'ListaskController@getUpdateListask',
    'middleware'=>'auth'
]);

Route::get('/getModify/{listask}', [
    'uses'=>'ListaskController@getUpdateListask',
    'middleware'=>'auth'
]);

// Valider l'update d'une tâche
Route::post('/setModify/{listask}', [
    'uses'=>'ListaskController@setUpdateListask',
    'middleware'=>'auth'
]);

// Delete une tâche
Route::delete('/list/{listask}', [
    'uses'=>'ListaskController@destroy',
    'middleware'=>'auth'
]);

//----------------------------------------------------------
// Pour l'authentification
//----------------------------------------------------------
Route::get('/session/logout', [
    'uses'=>'AuthenticationController@endOfSession',
    'middleware'=>'auth'
]);

Route::get('/session/logout', [
    'uses'=>'AuthenticationController@endOfSession',
    'middleware'=>'auth'
]);

Route::post('/session/logout', [
    'uses'=>'AuthenticationController@endOfSession',
    'middleware'=>'auth'
]);



Route::get('/aboutMe', [
    'uses'=>'TaskController@getAbout',
]);


// Authentication Routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
