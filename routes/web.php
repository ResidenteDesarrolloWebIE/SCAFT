<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();


Route::group(['middleware' => 'auth'], function () { 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('projects/services', 'Projects\ProjectController@showServices');
    Route::get('projects/supplies', 'Projects\ProjectController@showSupplies');
    Route::get('projects/advances/gallery', 'Projects\ProjectController@showGallery');
    Route::get('projects/advances/advance', 'Projects\ProjectController@showAdvances');
});

Route::group(['middleware' => ['auth','admin']], function () { 
    Route::get('projects', 'Projects\ProjectController@showProjects');
    Route::post('projects/create', 'Projects\ProjectController@create');
    Route::put('projects/edit', 'Projects\ProjectController@edit');
    Route::post('projects/images', 'Projects\ImageController@save')->name('projects-images');
    Route::put('projects/economicAdvance/edit', 'Projects\EconomicAdvanceController@edit');
    Route::put('projects/technicalAdvance/edit', 'Projects\EconomicAdvanceController@edit');
    Route::post('upload', 'Projects/ImageController@save')->name('upload-post');
    
    Route::get('saveMinuta','Projects\MinutaController@storeMinuta');
    Route::get('internalMinute/{id}','Projects\MinutaController@index');

    /*Route::get('customers', 'UserController@showCustomers');
    Route::post('customers/create', 'UserController@create');
    Route::put('customers/edit', 'UserController@edit');

    Route::put('technicalAdvance/edit', 'Project\TechnicalAdvance@edit');
    Route::put('economicAdvance/edit', 'Project\EconomicAdvance@edit');

    Route::get('projects', 'ProjectsController@index'); */
});



/* 
Old version
Route::group(['middleware' => 'auth'], function () { 
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('services', 'Quotes\ServiceController@showServices');
    Route::get('services/moreInformation','Quotes\ServiceController@showMoreInformation');
    Route::get('services/financialAdvance','Quotes\ServiceController@showFinancialAdvance');
    Route::get('services/technicalAdvance','Quotes\ServiceController@showTechnicalAdvance');
    Route::get('services/imagesGallery', 'ImageController@showImagesGallery');

    Route::get('supplies', 'Quotes\ProductController@showProducts');
    Route::get('supplies/moreInformation','Quotes\ProductController@showMoreInformation');
    Route::get('supplies/financialAdvance','Quotes\ProductController@showFinancialAdvance');
    Route::get('supplies/technicalAdvance','Quotes\ProductController@showTechnicalAdvance');
    Route::get('supplies/imagesGallery', 'ImageController@showImagesGallery');
    
    Route::post('project/create', 'Quotes\ProductController@create');
});

Route::group(['middleware' => ['auth','admin']], function () { 
    Route::get('projects', 'ProjectsController@index');
    Route::post('upload', 'ImageController@postUpload')->name('upload-post');
    Route::post('upload/delete', 'ImageController@deleteUpload');
    Route::get('server-images', 'ImageController@getServerImages')->name('server-images');
    Route::post('project/changeStatus', 'ProjectsController@changeStatus')->name('project-changeStatus');
    Route::post('files', 'FileController@uploadFile')->name('uploadFile');
}); */