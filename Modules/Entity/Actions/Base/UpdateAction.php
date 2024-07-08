<?php
namespace Modules\Entity\Actions\Base;

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
		
        return $this->saveMain();
		
    }

    private function saveMain(){
	     
        
		$this->model->fill($this->request->all());
		$this->model->save();
		if(!empty($this->request->photo)){
			
	    $name = array_keys($this->request->file())[0];
		if ($this->request->has($name)){
			/*
		  $file = $this->model->files->small;
		  
		  if(isset($file->id)){
			Storage::disk('public')->delete($file->small);
			Storage::disk('public')->delete($file->medium);
			Storage::disk('public')->delete($file->large);
			$this->model->files()->delete();
		  }
		  */
			$file = UploadPhoto::upload($this->request->{$name});
			
			$file->fileable()->associate($this->model)->save();
		    }
		}
    }


   
 

  
}