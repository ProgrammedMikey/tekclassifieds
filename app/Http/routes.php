<?php





Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'ClassifiedsController@index');
    Route::get('/home', 'HomeController@index');
    //classifieds routes
    Route::resource('classifieds', 'ClassifiedsController');
//categories routes
    Route::resource('categories', 'CategoriesController');

});
