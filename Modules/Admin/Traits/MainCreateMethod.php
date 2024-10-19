<?php

namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Admin\App\Http\Requests\BaseRequest;


trait MainCreateMethod
{
	
	public function store(BaseRequest $request){
		
		
		
		$action = new $this->action_create(new $this->def_model(), $request);
		
		try {
			$action->run();
		} catch (\Exception $e) {
			Alert::error('Errors', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
		}
		
		Alert::success('success', 'Успешно создано');

		return redirect()->route($this->route_path.'.update')->with('success', trans('main.created_model'));
	}
	
	
	public function create(Request $request)
	{
        
		$general = false;
		if ($request->general) {
			$general = $request->general;
		}

		return view($this->view_path . '.update', [
			'general' => $general,
			'title' => trans($this->title_path . '.create'),
			'ar_bread' => [
				route($this->route_path.'.create') => trans($this->title_path . '.create')
			] 
		]);
	}
	
	
   
}
