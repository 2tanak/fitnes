<?php
//'verified'
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::prefix('admin')->group(function() {
	
    Route::get('/', 'AdminController@index')->name('admin_index');
	
	 
     Route::group(['namespace'=>'Roles'],function () {
		  Route::resource('role', StartController::class);
	  });
	  
	  Route::group(['namespace'=>'Users'],function () {
		  Route::resource('user', StartController::class);
	  });
	  
	  
	  
	
	

	
	
	
	
	
});
});

Route::group(['namespace' => 'Edit'], function () {
Route::any('blog-editor',['uses' => 'CkeditorController@blog'])->name('blog-editor');

Route::any('drobsone-send-blog',['uses' => 'CkeditorController@blog'])->name('drobsone-send-blog');

Route::any('blog/remove',['uses' => 'CkeditorController@remove'])->name('remove');

});
