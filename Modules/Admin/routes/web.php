<?php
//'verified'
use Modules\Admin\App\Http\Requests\RoleRequest;


//'middleware'=>['role:admin']
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::prefix('admin')->group(function() {
	
    Route::get('/', 'AdminController@index')->name('admin_index');
	
	
	 });
});


