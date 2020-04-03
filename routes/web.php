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


Route::group(['middleware' => 'auth','customers'], function () { 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('projects/services', 'Projects\ProjectController@showServices');
    Route::get('projects/supplies', 'Projects\ProjectController@showSupplies');
    Route::get('projects/advances/gallery/{idPproject}/{typeProject}', 'Projects\ProjectController@showGallery');
    Route::get('projects/advances/advance/{idProject}/{typeProject}', 'Projects\ProjectController@showAdvances');
});

Route::group(['middleware' => ['auth','employees']], function () { 
    Route::get('projects', 'Projects\ProjectController@showProjects');
    Route::post('projects/create', 'Projects\ProjectController@create');
    Route::put('projects/edit', 'Projects\ProjectController@edit');
    Route::post('projects/images', 'Projects\ImageController@save')->name('projects-images');
    Route::put('projects/economicAdvance/edit', 'Projects\EconomicAdvanceController@edit');
    Route::put('projects/technicalAdvance/edit', 'Projects\EconomicAdvanceController@edit');
    Route::post('upload', 'Projects/ImageController@save')->name('upload-post');
    
    Route::get('projects/images', 'Projects\ImageController@showImages');
    Route::post('projects/images/save', 'Projects\ImageController@save')->name('projects-images');
    Route::post('projects/images/delete', 'Projects\ImageController@delete');
    
    Route::put('projects/economicAdvance/edit', 'Projects\EconomicAdvanceController@edit');
    Route::post('projects/technicalAdvance/edit', 'Projects\TechnicalAdvanceController@edit');
    Route::post('saveMinuta','Projects\MinutaController@storeMinuta');
    Route::get('minutas/{id}','Projects\MinutaController@index');
    Route::post('getFolioMinute','Projects\MinutaController@generateFolio');
    Route::get('getAgreements/{id}','Projects\MinutaController@getAgreements');
    Route::get('exportMinute/{id}','Projects\MinutaController@exportPDF');

    Route::get('agreements/{id}','Projects\AgreementController@index');
    Route::post('updateAgreement','Projects\AgreementController@update');

    Route::get('projects/customer/show', 'Projects\ProjectController@showProjectsByClient');
    Route::get('projects/customer/edit', 'Projects\ProjectController@editProjectsByClient');

    Route::get('projects/offers/download/{id}', 'Projects\OfferController@download');
    Route::get('projects/purchaseOrders/download/{id}', 'Projects\PurchaseOrderController@download');

    Route::get('users','UserController@showUsers');
    Route::post('users/create','UserController@create');

});