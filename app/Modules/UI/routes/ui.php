<?php

Route::prefix('app')->middleware(['web', 'auth'])->namespace('App\Modules\UI\Controllers')->group(function () {
    Route::get('', 'UIController@index')->name('FrontEnd.index');
    Route::get('/', function () {
        return view('ui::index');
    });

    Route::get('/home', function () {
        return view('ui::index');
    });

});

