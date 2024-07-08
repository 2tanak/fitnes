<?php
namespace Modules\Admin\Traits;

use PageService;
use App\Helper\CurrentLang;
use Illuminate\Http\Request;
use Modules\Entity\ModelParent;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Admin\App\Http\Requests\RoleRequest;

trait MainUpdateMethod  {
	
	public function edit(Request $request, ModelParent $item)
	{
		
		//dd($item->getPermissionAr());
		
		$user = auth()->user();
		if($user->hasDirectPermission('read blog')){
			//dd(100);
		}else{
			//dd(200);
		}
		//dd($item);
		$general = false;
		
		if ($request->general) {
			$general = $request->general;
		}


		if ($request->lang == 'ru' || !isset($request->lang)) {
			
			\App::setLocale('ru');
		}
        
       
		$title = trans($this->title_path . '.update');
		
		

		return view($this->view_path . '.update', [
			'general' => $general,
			'title' => $title,
			'ar_bread' => [
				
				route($this->route_path.'.index') => trans($this->title_path . '.index'),

			],
			'model' => $item
		]);
	}
	public function update(RoleRequest $request, ModelParent $item)
	{
		
		if (CurrentLang::get() && CurrentLang::get() != 'ru') {
			
			
		  $model = $item->relTrans()->updateOrCreate(['lang'=>$request->lang],$request->all());
		  Cache::forget($request->lang.$item->getNameSpace());
		  Cache::rememberForever($request->lang.$item->getNameSpace(), function () use($model){
			return $model;
			});
		} else {
			$model = $item;
			$action = new $this->action_update($model, $request);
		
         try {
			
			$action->run();
			
			
		} catch (\Exception $e) {
			Alert::error('Errors', $e->getMessage());
			return redirect()->back()->with('error', $e->getMessage());
		}
        }


		Alert::success('Successfully updated', 'Successfully updated');
       
		if (!empty($request->lang)) {
            return redirect()->route($this->route_path . '.edit', $item)->with('success', trans('main.updated_model'));
			//return redirect()->route($this->route_path . '.edit', $item->id . '?lang=' . $request->lang)->with('success', trans('main.updated_model'));
		} else {

			return redirect()->route($this->route_path . '.edit', $item)->with('success', trans('main.updated_model'));
		}
		
	}
  
}