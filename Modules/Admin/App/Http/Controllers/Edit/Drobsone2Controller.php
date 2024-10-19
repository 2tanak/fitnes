<?php

namespace Modules\Admin\Http\Controllers\Edit;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use App\Services\UploadPhoto;

use Storage;

use Intervention\Image\Facades\Image;

class Drobsone2Controller extends Controller
{

 public $papka_save;
 public $files;
 
const SIZES = [
	    'thumbs700' => 700,
	    'thumbs350' => 350,
	  ];
	
	public function import_img(Request $request)
    {
		//$hash = md5($image->__toString());
	 $this->files = $request->file('file');
	 $ext = $this->files->getClientOriginalExtension();
	
	 if(!in_array($ext,['jpg','jpeg','png'])){
		return false;
	}
     $this->papka_save = 'drobzone';
	 $url= '/uploads/'.$this->papka_save;
	 $file_name = pathinfo($this->files->getClientOriginalName(), PATHINFO_FILENAME);
	
			$path = $url."/original/{$file_name}.jpg";
			
			 foreach (self::SIZES as $key => $size) {
				 $destFile = str_replace('original',$key,$path);
				 $image = Image::make($request->file('file')->getPathName())->resize ($size, null,function($constraint) {
                 $constraint->aspectRatio();
               });
			   $size === 700 ? $zize_text = 90 : $zize_text = 40;
			   $image->text('adresska.ru', $image->width()/2, $image->height()/2, function($font) use($zize_text) { 
			    $font->file(public_path('OpenSans.ttf'));
			    $font->size($zize_text);  
                $font->color(array(0,0,0, 0.6));			 
                $font->align('center');  
                $font->angle(45);
			    })->encode('jpg');
			    Storage::disk('public')->put($destFile, $image);
				
			   }
			  }
            }
