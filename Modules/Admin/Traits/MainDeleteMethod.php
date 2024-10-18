<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use Modules\Entity\ModelParent;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
trait MainDeleteMethod  {
	
	
	public function destroy(Request $request, ModelParent $item) {
		
	    try{
        $action = new $this->action_delete($item, $request);
        $action->run();
		
        Alert::success('Success delete', 'Success delete');
        return redirect()->route($this->route_path.'.index')->with('success', trans('Success delete'));
		}catch(\Illuminate\Database\QueryException $e){
			Alert::error('Errors', $e->getMessage());
			return redirect()->back()->with('error', $e->getMessage());
		}
    }
}