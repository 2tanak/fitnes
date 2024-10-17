<?php
namespace Modules\Entity\Actions\Users;

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
		
	
		
		$this->model->delete();
		$this->model->roles()->delete();
		}

}