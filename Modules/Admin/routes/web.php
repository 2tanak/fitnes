<?php
//'verified'
use Modules\Admin\App\Http\Requests\RoleRequest;


//'middleware'=>['role:admin']
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::prefix('admin')->group(function() {
	
    Route::get('/', 'AdminController@index')->name('admin_index');
	
	Route::group(['namespace' => 'Blog'], function () {
		  Route::resource('blog', StartController::class);
		  
	  });
	 });
});


Route::group(['namespace' => 'Edit'], function () {
Route::any('blog-editor',['uses' => 'CkeditorController@blog'])->name('blog-editor');

Route::any('drobsone-send-blog',['uses' => 'CkeditorController@blog'])->name('drobsone-send-blog');

Route::any('blog/remove',['uses' => 'CkeditorController@remove'])->name('remove');

});