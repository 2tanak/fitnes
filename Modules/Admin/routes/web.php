<?php
//'verified'
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::prefix('admin')->group(function() {
	
    Route::get('/', 'AdminController@index')->name('admin_index');
	
	 });
});


