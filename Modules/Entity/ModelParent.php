<?php
namespace Modules\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Modules\Entity\Traits\DateHelper;
use Modules\Entity\Traits\FilterModel;
use Modules\Entity\Traits\RoleModel;
use Modules\Entity\Traits\ChangeModel;

use Modules\Entity\Traits\LabelModel;
use Route;
use App\Helper\CurrentLang;
use Cache;
class ModelParent extends Model {
    //use DateHelper, RoleModel, FilterModel, LabelModel, ChangeModel;
	use FilterModel;

    protected $lang = false;
    //use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
		
        $this->lang = CurrentLang::url();
    }

    public function setLocale($locale = false){
		
        if (!$locale){
            $this->lang = 'ru';
		}
        //CurrentLang::set($locale);
        $this->lang = $locale;
    }

    protected function getTransField($field, $v){
		
		
		$lang = CurrentLang::url();
		
		$route = Route::currentRouteName();
	  
		$ar=explode('.',$route);
		
        if(in_array('create',$ar)){
         return $v;
		}
		
		if ($this->lang == '' || $this->lang == 'ru'){
            return $v;
		 }
		
		
			 
	    $lang = Cache::get($lang.$this->getNameSpace());
		
		
		
        if (!isset($lang->{$field})) {
		
            return $v;
		}

        return $lang->{$field};
    }

    function getTitleAttribute(){
        return $this->getTable();
    }

}
