<?php


Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home'); 


    Route::resource('admin', 'AdmisController');
    Route::resource('admins', 'AdminsSubditController');

    Route::resource('laporan', 'LaporanController');
    Route::get('laporan/destroy/{id}', 'LaporanController@destroy');

    Route::group(['prefix'=>'laporanreport','as'=>'laporan.'], function(){
        Route::get('index', ['as' => 'subdit', 'uses' => 'LaporanSubditController@index'] );
    });


    Route::group(['prefix'=>'charts','as'=>'chart.'], function(){
        Route::get('subdit', ['as' => 'subdit', 'uses' => 'ChartController@getDataBySubdit'] );
        Route::get('unit', ['as' => 'unit', 'uses' => 'ChartController@getDataByUnit'] );
    });

    
    Route::get('/changepassword', 'ChangePasswordController@index'); 
    Route::post('/changepassword', 'ChangePasswordController@store')->name('change.password'); 

});

