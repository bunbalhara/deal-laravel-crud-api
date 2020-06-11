<?php

// as - route name
// prefix - route url
// namespace - ControllerNmae
// middleware - Middlewarename

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin','middleware'=>'auth'], function(){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    Route::resource('location', 'LocationController');

    Route::resource('theme', 'ThemeController');

    Route::resource('m-theme-location', 'LocationThemeController');

    Route::resource('special-date', 'SpecialdateController');

    Route::post('/import-deal/post-json', 'DealController@saveJson')->name('deal.post-json');
    Route::get('/import-deal/import-json', 'DealController@importJson')->name('deal.import-json');
    Route::resource('deal', 'DealController');


});

Route::post('/image-upload/upload', 'ImageUploadController@upload');
