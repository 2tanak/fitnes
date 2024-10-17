<?php
namespace Modules\Entity\Actions\Users;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;


class UpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
	
       $this->saveMain();
	   if($this->request->has('roles')){
		  
		  $this->roles_save();
	   }
    }

    private function saveMain(){
	     
     
		$this->model->fill($this->request->validated());
		$this->model->save();
	
    }

   public function roles_save(){
	
	   $arr = [];
       foreach($this->request->validated()['roles'] as $item){
		   $arr[] = (int) $item;
	   }
	  
	   $this->model->roles()->sync($arr);
	   
	   
   }
   
 

  
}