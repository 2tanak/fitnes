<?php
namespace Modules\Entity\Model\Users;
use Modules\Entity\ModelParent;
use Spatie\Permission\Models\Role;

class Model extends ModelParent {
    protected $table = 'users';
	//protected $with = ['files'];
	protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'name',
        'phone',
        'blocked',
		'password',
		'email_verified_at'
    ];
	
	protected $filter_class = Filter::class; 
    //use Presenter;
	
	  public function files()
      {
        return $this->morphOne(File::class, 'fileable');
      }
	
	public function getRolesAr(){
		return Role::pluck('name', 'id')->toArray();
		
	}
   public function roles_exists($role_id){
	
		if(in_array($role_id,$this->roles->pluck('id')->toArray())){
			return true;
		}
		return false;
	}
  
    public function roles()
    {
		
        return $this->belongsToMany(Role::class, 'role_user', 'user_id');
    }
}
