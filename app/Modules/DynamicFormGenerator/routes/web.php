<?php

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


Route::prefix('web/dynamicform/form-entries')
    ->middleware(['web', 'auth'])
    ->namespace('App\Modules\DynamicFormGenerator\Controllers\Web')
    ->group(function () {
        Route::get('', 'DynamicFormController@index')->name('DynamicFormController.index');
        Route::post('', 'DynamicFormController@create')->name('DynamicFormController.create');
        Route::put('/{id}', 'DynamicFormController@update')->name('DynamicFormController.create');
        Route::patch('/file', 'DynamicFormController@uploadFile')->name('DynamicFormController.uploadFile');
    });