<?php
namespace Modules\Entity\Model\File;
use Modules\Entity\ModelParent;
use App\Models\User;
use App\Models\File;

use App\Models\Lang;
//use App\Observers\NewsObserver;


class Model extends ModelParent {
    protected $table = 'files';
	//protected $with = ['files'];
	protected $fillable
        = [
            'disk',
            'path',
            'mime_type',
            'dir',
            'description',
            'name',
            'size',
			'small',
			'large',
			'medium'
        ];
	
	protected $filter_class = Filter::class; 
    use Presenter;
	
	public function fileable(){
		
		return $this->morphTo();
	}
	
	public function setImageAttribute($value)
    {
		
		file_put_contents(public_path('test.php'),'zzzzzzzzzzz');
		
        $this->attributes['path'] = 'dddddd';
    }
	/*
	protected static function boot()
    {
        parent::boot();
		Model::observe(NewsObserver::class);
    }
	*/
	/*
	public function optionsable()
    {
        return $this->morphMany(Option::class, 'optionable');
    }
	*/
	
	public function files()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
	
    //protected $filter_class = Filter::class; 
    use Presenter;
    
	/*
	 protected static function boot() {
        //parent::boot();
        //static::addGlobalScope(new ContentManagerScope);
    }
  */
	 function relEditedUser(){
        return $this->belongsTo('App\Models\User', 'edited_user_id');
    } 
	
 
	 function lang(){
        return $this->belongsToMany(
		'Modules\Entity\Model\LibLanguage\LibLanguage',
		'Modules\Entity\Model\Gid\GidLang', 'gid_id','lang_id');
    }
	



    function langs() {
        return $this->hasMany('Modules\Entity\Model\Gid\GidLang','gid_id','id');
    }
	
    
	
  function relTrans(){
	     return $this->morphMany(Lang::class, 'langable');
        //return $this->hasOne('App\Models\Lang', 'el_id');
    }
	
  public function getNameSpace(){
	  
        return __NAMESPACE__;
    }
	
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }

}
