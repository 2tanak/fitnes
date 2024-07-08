<?php
namespace Modules\Entity\Actions\Role;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;

use Storage;
use Route;
use Cache;


class UpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
		
       $this->saveMain();
	   if($this->request->has('permissions')){
		  $this->permissions_save();
	   }
    }

    private function saveMain(){
	     
     
		$this->model->fill($this->request->validated());
		$this->model->save();
		if(!empty($this->request->photo)){
			
	    $name = array_keys($this->request->file())[0];
		if ($this->request->has($name)){
		  $file = $this->model->files->small;
		  
		  if(isset($file->id)){
			Storage::disk('public')->delete($file->small);
			Storage::disk('public')->delete($file->medium);
			Storage::disk('public')->delete($file->large);
			$this->model->files()->delete();
		  }
		  
			$file = UploadPhoto::upload($this->request->{$name});
			$file->fileable()->associate($this->model)->save();
		    }
		}
    }

   public function permissions_save(){
	   //dd($this->request->validated()['permissions']);
	   //$this->model->givePermissionTo('add blog');
	   $arr = [];
       foreach($this->request->validated()['permissions'] as $item){
		   $arr[] = (int) $item;
	   }
	   $this->model->syncPermissions($arr);
	   
   }
   
 

  
}