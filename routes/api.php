<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('Createsupplier', 'SupplierController@store')->name('createsupplier');
Route::post('ingredients', 'IngredientController@store')->name('createingredients');
Route::get('ingredients/{id}', 'IngredientController@show')->name('getingrediant');
Route::put('ingredients/{id}', 'IngredientController@update')->name('Updateingredients');
Route::delete('ingredients/{id}', 'IngredientController@destroy')->name('destroyingredients');
Route::get('GetAllAingredients', 'IngredientController@index')->name('allingradiants');
Route::post('recipes', 'RecipeController@store')->name('createrecipes');
Route::get('recipes/{id}', 'RecipeController@show')->name('getrecipes');
Route::get('recipes/{id}', 'RecipeController@show')->name('getrecipes');
Route::post('order', 'OrderController@store')->name('CreateOrder');
Route::get('GetQuantity','OrderController@GetQuantity')->name('GetQuantity');

Route::get('/{recipes}/edit','RecipeController@edit')->name('editrecipes');
Route::post('/{recipes}','RecipeController@update')->name('updaterecipes');

