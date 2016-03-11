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

//Route::get('/', 'HomeController@index');
//Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController']);

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
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('creator', 'CreatorController@index');
    Route::get('ingredientsmanager', 'IngredientsManagerController@index');
    Route::resource('grains', 'Ingredients\GrainController');
    Route::resource('maltextracts', 'Ingredients\MaltExtractController');
    Route::resource('sugars', 'Ingredients\SugarController');
    Route::resource('fermentables', 'Ingredients\FermentableController');
    Route::resource('graintypes', 'Ingredients\GrainTypeController');
    Route::resource('grainclasses', 'Ingredients\GrainClassController');
    Route::resource('hops', 'Ingredients\HopController');
    Route::resource('yeastclasses', 'Ingredients\YeastClassController');
    Route::resource('yeasts', 'Ingredients\YeastController');
    Route::resource('finings', 'Ingredients\FiningController');
    Route::resource('watertreatments', 'Ingredients\WaterTreatmentController');
    Route::resource('acids', 'Ingredients\AcidController');
    Route::resource('salts', 'Ingredients\SaltController');
    Route::resource('ions', 'Ingredients\IonController');
    Route::resource('vendors', 'Ingredients\VendorController');
    Route::get('countries', 'CountryController@index');
});
