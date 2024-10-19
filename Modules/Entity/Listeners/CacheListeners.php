<?php
namespace Modules\Entity\Listeners;
use Carbon\Carbon;
use Modules\Entity\Events\СacheEvent;
use Illuminate\Filesystem\Filesystem;
use Storage;
use Cache;
class CacheListeners
{
    protected $request;
	
	
	public function __construct()
    {
		$this->request = app('request');
	
    }

    public function handle($event)
    {
		if ($event instanceof СacheEvent) {
			$this->cache($event);
		 }
		
		return true;
    }

  

   public function cache($event){
	
	    $arr= explode('\\',$event->model->langable_type);
		unset($arr[count($arr)-1]);
	    $key=implode('\\',$arr);
		Cache::forget($this->request->lang.$key);
		Cache::rememberForever($this->request->lang.$key, function () use($event){
			return $event->model;
			});
	  }
         
  
    
}