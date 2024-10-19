<?php
namespace Modules\Entity\Listeners;
use Carbon\Carbon;
use Modules\Entity\Events\Editor;
use Illuminate\Filesystem\Filesystem;
use Storage;
class EditorPhotoSave
{
    protected $request;
	
	
	public function __construct()
    {
		$this->request = app('request');
	
    }

    public function handle($event)
    {
		if ($event instanceof Editor) {
			$this->editor($event);
		 }
		
		return true;
    }

  

   public function editor($event){
	     preg_match_all('/uploads\/editor\/[\d]+\/[\d]+\/[\d+]+\/[\d\w]+.[\w]+/i',$this->request->text,$array2);
		 if(count($array2) >=0 ){
			 $editor_photo_arr=[];
			 
			 if(@unserialize($event->model->photo)){
				 
			  $editor_photo_arr = unserialize($event->model->photo);
			 }
			 if(count($editor_photo_arr) <=0){
				 return true;
			 }
			 $diff = array_diff($editor_photo_arr,$array2[0]);
			
			if(is_array($diff)){
			$event->model->photo= serialize($array2[0]);
			if(count($diff) >= 0){
			
			  foreach($diff as $item){
				 if(Storage::disk('public')->has($item)){
					Storage::disk('public')->delete($item);
				 }
			  }
			}
		   }
		  }
		 }
         
  
    
}