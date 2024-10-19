<?php

namespace Modules\Admin\App\Http\Controllers\Edit;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Routing\Controller;




class CkeditorController extends Controller
{

public $files;
public $papka_save;
public $path;

 public function image_save(){
	    $url= 'uploads/'.$this->papka_save.'/'.date('Y').'/'.date('m').'/'.date('d');
		$this->path= Storage::disk('public')->put( $url,  $this->files);
		
		return true;
			
	}
  

 


 public function ckeditor(request $request){
	
	  $this->files = $request->file('upload');
	  
	  $this->papka_save ='editor';
	 
	  $this->image_save();
	  
	    $CKEditorFuncNum = $request->input('CKEditorFuncNum');
		$url ='storage/'.$this->path;
		$url = asset($url);
            $msg = 'Изображение успешно загружено';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
	  
	  }

	

}
