<?php
namespace Modules\Entity\Actions\Role;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
use Modules\Entity\Model\Roles\Roleuser;
class DeleteAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
		
		if(isset($this->model->files->id)){
	        Storage::disk('public')->delete($this->model->files->small);
			Storage::disk('public')->delete($this->model->files->medium);
			Storage::disk('public')->delete($this->model->files->large);
			$this->model->files()->delete();
		}
		
		if(Storage::disk('public')->has('uploads/editor'.$this->model->id)){
			Storage::disk('public')->deleteDirectory('uploads/editor'.$this->model->id);
			
		}
		if($this->model->role_user->count() > 0){
			
		$role_user = Roleuser::query()->where(['role_id'=>$this->model->id])->delete();
		}
		$this->model->delete();
		}

}