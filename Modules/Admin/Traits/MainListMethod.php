<?php

namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use App\Models\User;
//use App\Models\Option;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait MainListMethod
{
	
	
	
	public function index(Request $request)
	{
		//dd(200);
	    $items = $this->def_model::filter($request)->latest()->paginate(20);
		
		$title = trans($this->title_path . '.index');
		return view($this->view_path . '.index', [
			'title' => $title,
			'items' => $items
		]);
	}
	

	
	
	
	
}
