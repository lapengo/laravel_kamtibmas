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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    // Route::group(['prefix'=>'laporans','as'=>'laporan.'], function(){    
    //     Route::get('/printpdfunit/{id}', ['as' => 'printpdfunit', 'uses' => 'PrintsController@printPDFUnit']);
    //     Route::get('/printpdfsubdit/{id}', ['as' => 'printpdfunit', 'uses' => 'PrintsController@printpdfsubdit']);
    //     Route::get('/printpdfbibnopsal/{id}', ['as' => 'printpdfunit', 'uses' => 'PrintsController@printpdfbibnopsal']);
        
    //     // Route::get('/printpdfunit/{id}', 'PrintsController@printPDFUnit')->name('laporan.printpdfunit');
    //     // Route::get('/printpdfsubdit/{id}', 'PrintsController@printPDFUnit')->name('laporan.printpdfsubdit');
    //     // Route::get('/printpdfbibnopsal/{id}', 'PrintsController@printPDFUnit')->name('laporan.printpdfbibnopsal');
    // });
    
    
    Route::resource('admin', 'AdminsController');
     
    Route::resource('laporan', 'LaporanController');
    Route::get('laporan/destroy/{id}', 'LaporanController@destroy');    

    Route::group(['prefix'=>'laporanreport','as'=>'laporan.'], function(){  
        Route::get('index', ['as' => 'subdit', 'uses' => 'LaporanSubditController@index'] );    
    });

    
    Route::group(['prefix'=>'charts','as'=>'chart.'], function(){  
        Route::get('subdit', ['as' => 'subdit', 'uses' => 'ChartController@getDataBySubdit'] );  
        Route::get('unit', ['as' => 'unit', 'uses' => 'ChartController@getDataByUnit'] );   
    });

});




// Route::get('/home', 'HomeController@index')->name('home'); 

