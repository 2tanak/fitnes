<?php

namespace Modules\Admin\Traits;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;

use Modules\Admin\App\Http\Requests\RoleRequest;


trait MainCreateMethod
{
	
	public function store(RoleRequest $request){
		
		$action = new $this->action_create(new $this->def_model(), $request);
		try {
			
			$action->run();
		} catch (\Exception $e) {
			//dd(170);
			//Alert::error('Errors', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
		}
		
		//Alert::success('success', 'Успешно создано');

		return redirect()->route($this->route_path.'.create')->with('success', trans('main.created_model'));
	}
	
	
	public function create(Request $request)
	{
        
		$general = false;
		if ($request->general) {
			$general = $request->general;
		}

		return view($this->view_path . '.create', [
			'general' => $general,
			'title' => trans($this->title_path . '.create'),
			'ar_bread' => [
				route($this->route_path.'.create') => trans($this->title_path . '.create')
			] 
		]);
	}
	
	public function saveCreate(Request $request)
	{
       
		try {
		   
           $validator = $this->validator($request->all());
			if ($validator->fails()) {
				Alert::error('Validation errors', 'Check the fields');
				return redirect()->back()->withErrors($validator);
			};
		} catch (\Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}

		$action = new $this->action_create(new $this->def_model(), $request);

		try {
			$action->run();
		} catch (\Exception $e) {
			Alert::error('Errors', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
		}
		
		Alert::success('success', 'Успешно создано');

		return redirect()->route($this->route_path.'.edit')->with('success', trans('main.created_model'));
	}
   
}
