<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::get('/search', [
        'as' => 'search.index',
        'uses' => 'SearchController@index'
    ]);

    Route::get('/search/product', [
        'as' => 'search.product',
        'uses' => 'SearchController@productSearch'
    ]);

    Route::get('/search/generic', [
        'as' => 'search.generic',
        'uses' => 'SearchController@genericSearch'
    ]);

    Route::get('/search/diseases', [
        'as' => 'search.diseases',
        'uses' => 'SearchController@diseasesSearch'
    ]);

    Route::get('api/search/entities', [
        'as' => 'search.entitySearch',
        'uses' => 'GlobalSearchController@searchEntities'
    ]);

    CRUD::resource('brand', 'BrandCrudController');
    CRUD::resource('generic', 'GenericCrudController');
    CRUD::resource('diseases', 'DiseasesCrudController');
    CRUD::resource('investigation', 'InvestigationCrudController');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('subdiseases', 'SubDiseasesCrudController');


}); // this should be the absolute last line of this file
